<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class NacionalController extends Controller
{
    use genericClass;

    public function index(){
        $view = View::make('loginResult.index');
        return $view;
    }

    public function contenFormTokenResult()
    {
        $view = View::make('loginResult.form_content');
        $returnView = array('view' => $view->render());
        return json_encode($returnView);
    }

    public function validateTokenUserNacional(request $request)
    {
        $tokenData = $request->input('tokenData');
        $email = $request->input('email');
        $tabla = $this->tablaByid(6);
        $confirmadato = $this->selectValidaMultiWhere2($tabla, 'remember_token', 'remember_token', $tokenData,'email',$email);
        // var_dump($confirmadato);exit();
        $confirmadatoRow = "";
        $urlData = "";

        $tokenEncript = encrypt($tokenData);
        $retorno = array('confirmadato' => $confirmadato, 'tokenEncript' => $tokenEncript, 'confirmadatoRow' => $confirmadatoRow, 'urlData' => $urlData);
        return json_encode($retorno);
    }

    public function reportNacional($tokenEncript)
    {
        try {
            $tokenDecript = decrypt($tokenEncript);
        } catch (\RuntimeException $e) {
            $tokenDecript = $tokenEncript;
        }
        $tabla = $this->tablaByid(6);
        $confirmadato = $this->selectFirst($tabla, 'remember_token', $tokenDecript);
        if ($confirmadato) {
            $id_user = $confirmadato->id;
        } else {
            $id_user = "";
        }
        if ($confirmadato != null || $confirmadato != '') {
            $view = View::make('resultNacional.index',compact('tokenEncript'));
            return $view;
        }

    }


    


}
