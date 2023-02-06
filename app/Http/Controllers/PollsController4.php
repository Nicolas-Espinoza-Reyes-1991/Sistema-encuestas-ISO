<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPolls;

class PollsController4 extends Controller
{
    use genericClass;

    public function poll_body($tokenEncript){
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
            $view = View::make('polls4.poll_body', compact('tokenEncript', 'id_user'));
            return $view;
        }
    }


    public function contenFormPoll(request $request)
    {
        $tokenEncript = $request->input('tokenEncript');
        $id_user = $request->input('id_user');
        $Selectores = $this->formularioEncuesta('matriz4', '1');
        $SelectoresDato = $this->formularioEncuesta('matriz4', '0');
        $selectGet = $this->selectFirst('encuesta4', 'id_usuario', $id_user);
        $magnitud = $this->selectorGeneric('magnitud', 'id_magnitud', 'descripcion');
        $view = View::make('polls4.poll_body_form', compact('tokenEncript', 'Selectores', 'SelectoresDato', 'id_user','selectGet', 'magnitud'));
        $returnView = array('view' => $view->render());
        return json_encode($returnView);
    }



    public function guardarEditarpolls(request $request)
    {

        $arrayPost = $request->input('formData');
        $identifierTabla = $request->input('identifier');
        $id = $request->input('id');
        $typeSave = $request->input('typeSave');
        $tabla1 = $this->tablaByid(11);
        $parsePost= $arrayPost;
        parse_str($parsePost, $parsePost);
        $confirmadato = $this->selectValida($tabla1, 'id_usuario', 'id_usuario', $parsePost['id_usuario']);
        if ($confirmadato) {
            $valida = $this->updateNoReturn($arrayPost, $tabla1, 'id_encuesta4', $id);
        }else{
            $valida = $this->guardarFormularioNoReturn($arrayPost, $tabla1);
        }
        if ($typeSave==1) {
            echo 1;
        }else{
            echo 2;
        }
    }


}
