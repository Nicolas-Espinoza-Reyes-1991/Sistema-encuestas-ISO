<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class CharacterController extends Controller
{
    use genericClass;

    public function validateTokenUser(request $request){
        $tokenData = $request->input('tokenData');
        $tabla = $this->tablaByid(1);
        $confirmadato = $this->selectValida($tabla, 'remember_token', 'remember_token', $tokenData);
        // var_dump($confirmadato);exit();
        $confirmadatoRow="";
        $urlData="";
        if ($confirmadato!="" || $confirmadato != NULL) {
            $selectGet = $this->selectFirst($tabla, 'remember_token', $tokenData);
            $id_usuario = $selectGet->id;
            $confirmadatoRow = $this->selectValida('encuesta_row', 'id_encuesta', 'id_usuario', $id_usuario);
            if ($confirmadatoRow!="" || $confirmadatoRow != NULL) {
                $urlData='1';
            }else{
                $urlData='2';
            }
        }

        $tokenEncript = encrypt($tokenData);
        $retorno = array('confirmadato' => $confirmadato, 'tokenEncript' => $tokenEncript, 'confirmadatoRow' => $confirmadatoRow, 'urlData' => $urlData);
        return json_encode($retorno);
    }


    public function contenFormToken(){
        $view = View::make('login.form_content');
        $returnView = array('view' => $view->render());
        return json_encode($returnView);
    }



    public function character($tokenEncript){

        try {
            $tokenDecript = decrypt($tokenEncript);
        } catch (\RuntimeException $e) {
            $tokenDecript = $tokenEncript;
        }
        $tabla = $this->tablaByid(1);
        $confirmadato = $this->selectFirst($tabla,'remember_token', $tokenDecript);
        if ($confirmadato) {
            $id_user = $confirmadato->id;
        }else{
            $id_user = "";
        }
        if ($confirmadato!=null || $confirmadato != '') {   
            $view = View::make('character.index', compact('id_user', 'tokenEncript'));
            return $view;
        }
    }


    public function contenFormCharacter(request $request)
    {
        $id_user = $request->input('id_user');
        $tokenEncript = $request->input('tokenEncript');
        $regiones = $this->selectorGeneric('regiones', 'id_region', 'nombre');
        $confirm = $this->selectorGeneric('confirm', 'id_confirm', 'description');
        $selectGet = $this->selectFirst('caracterizacion', 'id_usuario', $id_user);
        $view = View::make('character.form_character', compact('id_user', 'tokenEncript', 'regiones', 'confirm', 'selectGet'));
        $returnView = array('view' => $view->render());
        return json_encode($returnView);
    }


    public function guardarEditarCharacter(request $request){
        $arrayPost = $request->input('formData');
        $identifierTabla = $request->input('identifier');
        $id = $request->input('id');
        $tabla = $this->tablaByid(2);
        $confirmadato = $this->selectValida($tabla, 'id_caracterizacion', 'id_caracterizacion', $id);
        if ($confirmadato == true) {
            $valida = $this->update($arrayPost, $tabla, 'id_caracterizacion', $id);
        } else {
            $valida = $this->guardarFormulario($arrayPost, $tabla);
        }
    }

}
