<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPolls;

class IsoPollsController1 extends Controller
{
    use genericClass;

    public function isoPoll1_body($tokenEncript){
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
            $tabla2 = $this->tablaByid(13);
            $confirmaTimer = $this->selectFirstWhere($tabla2, 'id_usuario', $id_user, 'tipo_encuesta_iso', 1);
            if ($confirmaTimer) {
                $timer = $confirmaTimer->time;
            } else {
                DB::table('timer_encuesta_iso')->insert([
                    'tipo_encuesta_iso' => 1,
                    'id_usuario' =>  $id_user,
                ]);
                $confirmaTimer2 = $this->selectFirstWhere($tabla2, 'id_usuario', $id_user, 'tipo_encuesta_iso', 1);
                $timer = $confirmaTimer2->time;
            }
            $view = View::make('isoPolls1.poll_body', compact('tokenEncript', 'id_user','timer'));
            return $view;
        }
    }


    public function contenFormIsoPoll1(request $request)
    {
        $tokenEncript = $request->input('tokenEncript');
        $id_user = $request->input('id_user');
        $timer = $request->input('timer');
        $Selectores = $this->formularioEncuesta('matriz_iso1', '1');
        $SelectoresDato = $this->formularioEncuesta('matriz_iso1', '0');
        $selectGet = $this->selectFirst('encuesta_iso1', 'id_usuario', $id_user);
        $view = View::make('isoPolls1.poll_body_form', compact('tokenEncript', 'Selectores', 'SelectoresDato', 'id_user', 'selectGet','timer'));
        $returnView = array('view' => $view->render());
        return json_encode($returnView);
    }



    public function guardarEditarIsopolls1(request $request)
    {
        $arrayPost = $request->input('formData');
        $identifierTabla = $request->input('identifier');
        $id = $request->input('id');
        $typeSave = $request->input('typeSave');
        $tabla1 = $this->tablaByid(14);
        $parsePost= $arrayPost;
        parse_str($parsePost, $parsePost);
        $confirmadato = $this->selectValida($tabla1, 'id_usuario', 'id_usuario', $parsePost['id_usuario']);
        if ($confirmadato) {
            $valida = $this->updateNoReturn($arrayPost, $tabla1, 'id_encuesta', $id);
        }else{
            $valida = $this->guardarFormularioRetunId($arrayPost, $tabla1);
        }

       
        $valPon = "";
        $nombreColumna = "";

        foreach ($parsePost as $nCol => $value) {
            if ($nCol == "id_usuario") {
                $id_usuario = $value;
            }
            if (strpos($nCol, "p") == "true") {
                $nombreColumna = substr($nCol, 1);
                $valPon = $value;
                $arrayInsert[] = ["id_usuario" => $id_usuario,"id_formulario" => $valida, "numero_columna" => $nombreColumna, "valor" => $valPon];
            }
        }
        $tabla2 = $this->tablaByid(18);
        DB::table('' . $tabla2 . '')->insert($arrayInsert);

        if ($typeSave==1 || $typeSave == 0) {
            echo 1;
        }else{
            echo 2;
        }
    }

}
