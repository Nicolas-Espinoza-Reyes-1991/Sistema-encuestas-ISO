<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPolls;

class IsoGraficoController extends Controller
{
    use genericClass;

    public function index($tokenEncript,$number_graf){
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
            $view = View::make('resultadoIso.index', compact('tokenEncript', 'id_user','number_graf'));
            return $view;
        }
    }


    public function bodyGrafIso(request $request)
    {
        $tokenEncript = $request->input('tokenEncript');
        $id_user = $request->input('id_user');
        $number_graf = $request->input('number_graf');
        $resultList = $this->resultList($id_user, $number_graf);
        $resultCount = $this->resultCount($id_user, $number_graf);
        foreach ($resultCount as $value) {
            $Countincorrecta[] = $value->incorrecta;
            $Countincompleta[] = $value->incompleta;
            $Countcorrecta[] = $value->correcta;
        }
        $Countincorrecta = implode(",", $Countincorrecta);
        $Countincompleta = implode(",", $Countincompleta);
        $Countcorrecta = implode(",", $Countcorrecta);
        $view = View::make('resultadoIso.body_graf', compact('tokenEncript','id_user', 'number_graf', 'Countincorrecta', 'Countincompleta', 'Countcorrecta', 'resultList'));
        $returnView = array('view' => $view->render());
        return json_encode($returnView);
    }


    public function resultList($id_user, $number_graf){
        $tabla1 = 'encuesta_iso_row' . $number_graf;
        $tabla2 = 'matriz_iso' . $number_graf;
        $resultList = DB::table(''.$tabla2.' AS a')
            ->select('a.Pregunta','b.valor')
            ->leftJoin(''.$tabla1.' AS b', 'a.N', '=', 'b.numero_columna')
            ->where("b.id_usuario", "=", "" . $id_user . "")
            ->get();
        return $resultList;
    }



    public function resultCount($id_user, $number_graf){

        $tabla= 'encuesta_iso_row'.$number_graf;

        $resultCount = DB::table(''. $tabla.' AS a' )
            ->select(DB::raw('SUM( if( a.valor = 0, 1, 0)) as incompleta'), DB::raw('SUM( if( a.valor != 1 AND a.valor != 0, 1, 0)) as incorrecta'), DB::raw('SUM( if( a.valor = 1, 1, 0)) as correcta'))
            ->where("a.id_usuario", "=", "" . $id_user . "")
            ->get();

        return $resultCount;
    }

    





}
