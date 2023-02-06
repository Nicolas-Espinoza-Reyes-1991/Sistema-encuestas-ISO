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


class PdfController extends Controller
{
    use genericClass;


    public function totalPorDimensionMultiArray($id_user, $dimension)
    {
        $totalPorDimensionMultiArray = DB::table("encuesta_row")
        ->select(DB::raw('count(dimension) AS totalIndicadores'), DB::raw('SUM( if( id_ponderado = 11, 1, 0)) as noiniciado'), DB::raw('SUM( if( id_ponderado = 22, 1, 0)) as enproceso'), DB::raw('SUM( if( id_ponderado = 33, 1, 0)) as completo'))
        ->where("id_usuario", "=", "" . $id_user . "")
            ->where("dimension", "=", "" . $dimension . "")
            ->first();
        return $totalPorDimensionMultiArray;
    }

    public function listadoDimension($id_user, $dimension)
    {
        $listadoDimension = DB::table("encuesta_row AS a")
        ->select("b.indicador", "a.id_ponderado")
        ->leftJoin('matriz AS b', 'a.numero_columna', '=', 'b.f1')
        ->where("a.id_usuario", "=", "" . $id_user . "")
            ->where("a.dimension", "=", "" . $dimension . "")
            ->groupBy("b.f1")
            ->get();
        return $listadoDimension;
    }




    public function modalGraficoDimensionDownload()
    {
        $id_user = 2;
        $dimension = 1;
        // $tituloDimension = $request->input('titulo');
        $cont = 1;

        $matriz = $this->selectFirst('dimensiones', 'idDimension', $dimension);

        $tituloDimension = $matriz->Nombre;

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

        $view = View::make('download.total_Dimensiones' . $cont, compact('totalPorDimensionMultiArray', 'listadoDimension', 'noIniciadoList', 'noIniciadoListCount', 'enProcesoList', 'enProcesoListCount', 'completoList', 'completoListCount', 'tituloDimension'));

        // $returnView = array('modalResultGrafico' => $modalResultGrafico->render());

        // return json_encode($returnView);

        // $view = View::make('personasActivas.tbl_persona_activa', compact('tbl', 'periodoActual'));
        $view = $view->render();
        return $view;
    }
    


    public function download()
    {
        $id_user=2;

        $grafico41=$this->modalGraficoDimensionDownload(1,1,2,1);

        

        $pdf = PDF::loadView('download.index', ['grafico41'=>$grafico41, 'id_user'=> $id_user] )->setOptions(['defaultFont' => 'sans-serif']);



        return $pdf->download('EncuestasEligeVivirSinDrogas.pdf');
    } 

}
