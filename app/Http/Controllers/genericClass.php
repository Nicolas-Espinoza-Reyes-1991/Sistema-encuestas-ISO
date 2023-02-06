<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;
use App\Archivo;
use App\Factura;
use App\estado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Http\Controllers\Validator;
use DataTables;
use FilesystemIterator;

trait genericClass {


    public function tablaByid($op) {
      switch ($op) {
          case 1:
            return "users";
            break;
          case 2:
            return "caracterizacion";
            break;
          case 3:
            return "encuesta";
            break;
          case 4:
            return "encuesta_row";
            break;
          case 5:
            return "profesional";
            break;
          case 6:
            return "admin";
            break;
          case 7:
            return "encuesta2";
            break;
          case 8:
            return "encuesta_row2";
            break;
          case 9:
            return "encuesta3";
            break;
          case 10:
            return "encuesta_row3";
            break;
          case 11:
            return "encuesta4";
            break;
          case 12:
            return "encuesta_row4";
            break;
          case 13:
            return "timer_encuesta_iso";
            break;
          case 14:
            return "encuesta_iso1";
            break;
          case 15:
            return "encuesta_iso2";
            break;
          case 16:
            return "encuesta_iso3";
            break;
          case 17:
            return "encuesta_iso4";
            break;
          case 18:
            return "encuesta_iso_row1";
            break;
          case 19:
            return "encuesta_iso_row2";
            break;
          case 20:
            return "encuesta_iso_row3";
            break;
          case 21:
            return "encuesta_iso_row4";
            break;
        }
    }


    public function monthByid($op) {
      switch ($op) {
          case 1:
            return "Enero";
            break;
          case 2:
            return "Febrero";
            break;
          case 3:
            return "Marzo";
            break;
          case 4:
            return "Abril";
            break;
          case 5:
            return "Mayo";
            break;
          case 6:
            return "Junio";
            break;
          case 7:
            return "Julio";
            break;
          case 8:
            return "Agosto";
            break;
          case 9:
            return "Septiembre";
            break;
          case 10:
            return "Octubre";
            break;
          case 11:
            return "Noviembre";
            break;
          case 12:
            return "Diciembre";
            break;
        }
    }

    public function guardarFormulario($arrayPost,$tabla){
      parse_str($arrayPost,$arrayPost);
      $valida = DB::table(''.$tabla.'')
      ->insert($arrayPost);
      // ->insertGetId($arrayPost);
      echo $valida;
    }



  public function guardarFormularioNoReturn($arrayPost, $tabla)
  {
    parse_str($arrayPost, $arrayPost);
    $valida = DB::table('' . $tabla . '')
    ->insert($arrayPost);
    // ->insertGetId($arrayPost);
    //echo $valida;
  }


  public function guardarFormularioRetunId($arrayPost, $tabla)
  {
    parse_str($arrayPost, $arrayPost);
    $valida = DB::table('' . $tabla . '')
    ->insertGetId($arrayPost);
    return $valida;
    // ->insertGetId($arrayPost);
    //echo $valida;
  }

    public function guardarFormularioDos($arrayPost,$tabla){
      // parse_str($arrayPost,$arrayPost);
      $valida = DB::table(''.$tabla.'')
      ->insert($arrayPost);
      // ->insertGetId($arrayPost);
      echo $valida;
      

    }


  public function selectCont($tabla,$idname,$id){
      $selectCont=DB::table(''.$tabla.'')
      ->select(DB::raw('count('.$idname.') AS contador'))
      ->where(''.$idname.'',$id)
      ->first();
      if ($selectCont->contador) {
        return true;
      }else{
         return false;
      }
  }



  public function selectCont2($tabla,$idname,$id){
      $selectCont=DB::table(''.$tabla.'')
      ->select(DB::raw('count('.$idname.') AS result'))
      ->where(''.$idname.'',$id)
      ->first();
      return $selectCont;
  }

  public function selectFirst($tabla,$idname,$id){
    $selectFirst=DB::table(''.$tabla.'')
    ->select('*')
    ->where(''.$idname.'',$id)
    ->first();
    // var_dump($selectFirst);
    return $selectFirst;
  }


  public function selectValida($tabla,$select,$idname,$id){
    $selectValida=DB::table(''.$tabla.'')
    ->select('*')
    ->where(''.$idname.'',$id)
    ->value("".$select."");
    return $selectValida;
  }

  public function selectValidaMultiWhere($tabla, $select, $idname1,$id1, $idname2, $id2){
    $selectValidaMultiWhere = DB::table('' . $tabla . '')
    ->select('*')
    ->where('' . $idname1 . '', $id1)
    ->orWhere('' . $idname2 . '', $id2)
    ->value("" . $select . "");
    // echo $selectValidaMultiWhere;
    return $selectValidaMultiWhere;
  }


  public function selectValidaMultiWhere2($tabla, $select, $idname1, $id1, $idname2, $id2)
  {
    $selectValidaMultiWhere = DB::table('' . $tabla . '')
    ->select('*')
    ->where('' . $idname1 . '', $id1)
    ->Where('' . $idname2 . '', $id2)
    ->value("" . $select . "");
    // echo $selectValidaMultiWhere;
    return $selectValidaMultiWhere;
  }


  public function selectFirstWhere($tabla,$idname1,$id1,$idname2,$id2){
    $selectFirstWhere=DB::table(''.$tabla.'')
    ->select('*')
    ->where(''.$idname1.'',$id1)
    ->where(''.$idname2.'',$id2)
    ->first();
    return $selectFirstWhere;
  }

  public function selectGet(){
      // $selectGet=DB::table('ficha_ingreso')
      // ->select('*')
      // ->where('id_persona',8)
      // ->get();
      return $selectGet;
  }

  public function selectorGeneric($tabla,$id,$descripcion){

    $selectorGeneric = DB::table(''.$tabla.'')
    ->select(''.$id.'',''.$descripcion.'')
    ->orderBy(''.$id.'', 'asc')
    ->get();
    return $selectorGeneric;

  }


  public function formularioEncuesta($tabla,$group)
  {

    $selectorGeneric = DB::table('' . $tabla . '')
    ->select('*')
    ->orderBy('f1', 'asc');
    
    if ($group==1) {
      $selectorGeneric= $selectorGeneric ->groupBy('f1');
    }

    $selectorGeneric = $selectorGeneric->get();
    return $selectorGeneric;
  }


  public function selectorGenericWhere($tabla,$id,$descripcion,$where,$value){

    $selectorGenericWhere = DB::table(''.$tabla.'')
    ->select(''.$id.'',''.$descripcion.'')
    ->orderBy(''.$id.'', 'asc')
    ->where(''.$where.'',$value)
    ->get();
    return $selectorGenericWhere;

  }

  public function selectorGenericWhere2($tabla, $id,$cod, $descripcion, $where, $value)
  {

    $selectorGenericWhere = DB::table('' . $tabla . '')
    ->select('' . $id . '','' . $cod . '', '' . $descripcion . '')
    ->orderBy('' . $id . '', 'asc')
    ->where('' . $where . '', $value)
    ->get();
    return $selectorGenericWhere;
  }

  public function selectorGenericWhereIn($tabla,$id,$descripcion,$where,$value){

    $selectorGenericWhere = DB::table(''.$tabla.'')
    ->select(''.$id.'',''.$descripcion.'')
    ->orderBy(''.$id.'', 'asc')
    ->whereIn(''.$where.'',$value)
    ->get();
    return $selectorGenericWhere;

  }


  public function selectorGenericMultiWhere($tabla,$id,$descripcion,$where,$value,$where2,$value2){

    $selectorGenericWhere = DB::table(''.$tabla.'')
    ->select(''.$id.'',''.$descripcion.'')
    ->orderBy(''.$id.'', 'asc')
    ->where(''.$where.'',$value)
    ->where(''.$where2.'',$value2)
    ->get();
    return $selectorGenericWhere;

  }

  public function update($arrayPost,$tabla,$idname,$id){
    parse_str($arrayPost,$arrayPost);
    $update=DB::table(''.$tabla.'')
    ->where(''.$idname.'',$id)
    ->update($arrayPost);

    if ($update==0) {
      $update=1;
    }

    echo $update;
  }



  public function updateNoReturn($arrayPost, $tabla, $idname, $id)
  {
    parse_str($arrayPost, $arrayPost);
    $update = DB::table('' . $tabla . '')
    ->where('' . $idname . '', $id)
    ->update($arrayPost);

    // if ($update == 0) {
    //   $update = 1;
    // }

    // echo $update;
  }



    public function updateGeneric($arrayPost,$tabla,$idname,$id){
      // parse_str($arrayPost,$arrayPost);
      $update=DB::table(''.$tabla.'')
      ->where(''.$idname.'',$id)
      ->update($arrayPost);

      if ($update==0) {
        $update=1;
      }

      echo $update;
    }


    public function deleteGeneric($tabla,$id_name,$id){
      $delete = DB::table(''. $tabla .'')
      ->where(''. $id_name .'', $id)
      ->delete();
      echo $delete;
    }


    public function deleteMultiWhere($tabla, $id_name1,$id1, $id_name2, $id2)
    {
      $delete = DB::table('' . $tabla . '')
      ->where('' . $id_name1 . '', $id1)
      ->where('' . $id_name2 . '', $id2)
      ->delete();
      echo $delete;
    }

  
}
