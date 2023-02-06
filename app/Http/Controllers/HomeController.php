<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPolls;

class HomeController extends Controller
{
    use genericClass;

    public function homePolls($tokenEncript){
        try {
            $tokenDecript = decrypt($tokenEncript);
        } catch (\RuntimeException $e) {
            $tokenDecript = $tokenEncript;
        }
        $tabla = $this->tablaByid(1);
        $confirmadato = $this->selectFirst($tabla, 'remember_token', $tokenDecript);
        if ($confirmadato) {
            $id_user = $confirmadato->id;
        } else {
            $id_user = "";
        }
        if ($confirmadato != null || $confirmadato != '') { 
            $view = View::make('HomePolls.index', compact('tokenEncript', 'id_user'));
            return $view;
        }
    }


    public function form_content(request $request)
    {
        $tokenEncript = $request->input('tokenEncript');
        $tokenDecript = decrypt($tokenEncript);
        $tabla1 = $this->tablaByid(1);
        $confirmadato = $this->selectFirst($tabla1, 'remember_token', $tokenDecript);
        if ($confirmadato) {
            $id_user = $confirmadato->id;
        } else {
            $id_user = "";
        }
        $tabla2 = $this->tablaByid(11);
        $confirmadato1 = $this->selectFirst($tabla2, 'id_usuario', $id_user);
        if ($confirmadato1) {
            $riesgo_result = 1;
        } else {
            $riesgo_result = 0;
        }

        $tabla3 = $this->tablaByid(14);
        $confirmadato2 = $this->selectFirst($tabla3, 'id_usuario', $id_user);
        if ($confirmadato2) {
            $iso1_result = 1;
        } else {
            $iso1_result = 0;
        }
        $tabla4 = $this->tablaByid(15);
        $confirmadato3 = $this->selectFirst($tabla4, 'id_usuario', $id_user);
        if ($confirmadato3) {
            $iso2_result = 1;
        } else {
            $iso2_result = 0;
        }
        $tabla5 = $this->tablaByid(16);
        $confirmadato4 = $this->selectFirst($tabla5, 'id_usuario', $id_user);
        if ($confirmadato4) {
            $iso3_result = 1;
        } else {
            $iso3_result = 0;
        }
        $tabla6 = $this->tablaByid(17);
        $confirmadato5 = $this->selectFirst($tabla6, 'id_usuario', $id_user);
        if ($confirmadato5) {
            $iso4_result = 1;
        } else {
            $iso4_result = 0;
        }

        $view = View::make('homePolls.homePolls_body', compact('tokenEncript', 'riesgo_result','iso1_result','iso2_result','iso3_result', 'iso4_result'));
        $returnView = array('view' => $view->render());
        return json_encode($returnView);
    }




}
