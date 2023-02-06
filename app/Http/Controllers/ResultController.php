<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Query\Builder\lists;
//use Barryvdh\DomPDF\Facade as PDF;
use PDF;


class ResultController extends Controller
{
    use genericClass;
    

    public function result($tokenEncript){

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
            $view = View::make('result.index', compact('id_user', 'tokenEncript'));
            return $view;
        }
    } 


    public function graficos(request $request){
        $id_user = $request->input('id_user');
        $totalFinalDimensiones=$this->totalFinalDimensiones($id_user);
        $totalPorDimension = $this->totalPorDimension($id_user);
        // $dimensionDesc[]="";
        // $noiniciado[]="";
        // $enproceso[]="";
        // $completo[]="";
        foreach ($totalPorDimension as $value) {
            $dimensionDesc[]=$value->dimensionDesc;
            $noiniciado[]=$value->noiniciado;
            $enproceso[]=$value->enproceso;
            $completo[]=$value->completo;
        }

        $dimensionDesc= $dimensionDesc;
        $noiniciado= implode(",",$noiniciado);
        $enproceso = implode(",", $enproceso);
        $completo = implode(",", $completo);

        $view1 = View::make('result.grafico1',compact('totalFinalDimensiones'));
        $view2 = View::make('result.grafico2',compact('totalPorDimension', 'totalFinalDimensiones'));
        $view3 = View::make('result.grafico3',compact( 'noiniciado','dimensionDesc', 'enproceso', 'completo'));
        $view4 = View::make('result.grafico4',compact('totalPorDimension', 'id_user'));
        $returnView = array('grafico1' => $view1->render(), 'grafico2' => $view2->render(), 'grafico3' => $view3->render(), 'grafico4' => $view4->render());
        return json_encode($returnView);

    }

    public function totalFinalDimensiones($id_user)
    {
        $totalFinalDimensiones=DB::table("encuesta_row")
        ->select(DB::raw('count(dimension) AS totalIndicadores') ,DB::raw('SUM( if( id_ponderado = 11, 1, 0)) as noiniciado'), DB::raw('SUM( if( id_ponderado = 22, 1, 0)) as enproceso'), DB::raw('SUM( if( id_ponderado = 33, 1, 0)) as completo') )
        ->where("id_usuario", "=", "". $id_user ."")
        ->first();
        return $totalFinalDimensiones;
    }


    public function totalPorDimension($id_user)
    {
        $totalPorDimension = DB::table("encuesta_row AS a")
        ->select(DB::raw('count(a.dimension) AS totalDimension'),"a.dimension","b.nombre AS dimensionDesc", DB::raw('SUM( if( a.id_ponderado = 11, 1, 0)) as noiniciado'), DB::raw('SUM( if( a.id_ponderado = 22, 1, 0)) as enproceso'), DB::raw('SUM( if( a.id_ponderado = 33, 1, 0)) as completo'))
        ->leftJoin('dimensiones AS b', 'a.dimension','=', 'b.idDimension')
        ->where("a.id_usuario", "=", "" . $id_user . "")
        ->groupBy("a.dimension")
        ->get();

        return $totalPorDimension;
    }


    public function modalGraficoDimension(request $request)
    {
        $id_user = $request->input('id_user');
        $dimension = $request->input('dimension');
        $tituloDimension = $request->input('titulo');
        $totalPorDimensionMultiArray = $this->totalPorDimensionMultiArray($id_user,$dimension);
        $listadoDimension = $this->listadoDimension($id_user, $dimension);
        $noIniciadoList=null;
        $enProcesoList = null;
        $completoList = null;
        foreach ($listadoDimension as $value) {
            if ($value->id_ponderado==11) {
                $noIniciadoList[] = $value->indicador;
            }elseif($value->id_ponderado==22){
                $enProcesoList[] = $value->indicador;
            }elseif($value->id_ponderado==33){
                $completoList[] = $value->indicador;
            }
        }
        $noIniciadoListCount=0;
        $enProcesoListCount=0;
        $completoListCount=0;
        if (is_array($noIniciadoList)) {
            $noIniciadoListCount = count($noIniciadoList);
        }
        
        if($enProcesoList){
            $enProcesoListCount = count($enProcesoList);
        }
        
        if($completoList){
            $completoListCount = count($completoList);
        }        
        $modalResultGrafico = View::make('result.modal_grafico4', compact('totalPorDimensionMultiArray', 'listadoDimension', 'noIniciadoList', 'noIniciadoListCount', 'enProcesoList', 'enProcesoListCount', 'completoList', 'completoListCount', 'tituloDimension') );
        $returnView = array('modalResultGrafico' => $modalResultGrafico->render());
        return json_encode($returnView);
   
}



    public function totalPorDimensionMultiArray($id_user, $dimension)
    {
        $totalPorDimensionMultiArray = DB::table("encuesta_row")
        ->select(DB::raw('count(dimension) AS totalIndicadores'), DB::raw('SUM( if( id_ponderado = 11, 1, 0)) as noiniciado'), DB::raw('SUM( if( id_ponderado = 22, 1, 0)) as enproceso'), DB::raw('SUM( if( id_ponderado = 33, 1, 0)) as completo'))
        ->where("id_usuario", "=", "" . $id_user . "")
        ->where("dimension", "=", "" . $dimension . "")
        ->first();
        return $totalPorDimensionMultiArray;
    }

    public function listadoDimension($id_user, $dimension){
        $listadoDimension = DB::table("encuesta_row AS a")
        ->select("b.indicador", "a.id_ponderado")
        ->leftJoin('matriz AS b', 'a.numero_columna', '=', 'b.f1')
        ->where("a.id_usuario", "=", "" . $id_user . "")
        ->where("a.dimension", "=", "" . $dimension . "")
        ->groupBy("b.f1")
        ->get();
        return $listadoDimension;
    }



    public function modalGraficoDimensionDownload(request $request)
    {
        $id_user = $request->input('id_user');
        $dimension = $request->input('dimension');
        // $tituloDimension = $request->input('titulo');
        $cont = $request->input('cont');

        $matriz= $this->selectFirst('dimensiones', 'idDimension', $dimension);

        $tituloDimension=$matriz->Nombre;

        $totalPorDimensionMultiArray = $this->totalPorDimensionMultiArray($id_user, $dimension);
        $listadoDimension = $this->listadoDimension($id_user, $dimension);
        $noIniciadoList = null;
        $enProcesoList = null;
        $completoList = null;
        foreach ($listadoDimension as $value) {
            if ($value->id_ponderado == 11) {
                $noIniciadoList[] = $value->indicador;
            } elseif ($value->id_ponderado == 22) {
                $enProcesoList[] = $value->indicador;
            } elseif ($value->id_ponderado == 33) {
                $completoList[] = $value->indicador;
            }
        }
        $noIniciadoListCount = 0;
        $enProcesoListCount = 0;
        $completoListCount = 0;
        if (is_array($noIniciadoList)) {
            $noIniciadoListCount = count($noIniciadoList);
        }

        if ($enProcesoList) {
            $enProcesoListCount = count($enProcesoList);
        }

        if ($completoList) {
            $completoListCount = count($completoList);
        }

        $modalResultGrafico = View::make('download.total_Dimensiones'.$cont, compact('totalPorDimensionMultiArray', 'listadoDimension', 'noIniciadoList', 'noIniciadoListCount', 'enProcesoList', 'enProcesoListCount', 'completoList', 'completoListCount', 'tituloDimension'));

        $returnView = array('modalResultGrafico' => $modalResultGrafico->render());

        return json_encode($returnView);
    }




}
