<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPolls;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Http\Controllers\Validator;
use DataTables;
use FilesystemIterator;
use Livewire\Component;
use App\Exports\UnoExport;
use App\Exports\DosExport;
use App\Exports\TresExport;
use App\Exports\CuatroExport;
use App\Exports\CincoExport;
use App\Exports\SeisExport;
use App\Exports\SieteExport;
use App\Exports\OchoExport;

use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    use genericClass;


    public function excel(request $request,$tipo_reporte, $tokenEncript)
    {
        try {
            $tokenDecript = decrypt($tokenEncript);
        } catch (\RuntimeException $e) {
            exit();
            // $tokenDecript = $tokenEncript;
        }
        $tabla = $this->tablaByid(6);
        $confirmadato = $this->selectFirst($tabla, 'remember_token', $tokenDecript);
        if ($confirmadato) {
            $id_user = $confirmadato->id;
        } else {
            $id_user = "";
        }
        if ($confirmadato != null || $confirmadato != '') {
            switch ($tipo_reporte) {
                case 1:
                    return Excel::download(new UnoExport($tipo_reporte), 'encuesta1.xlsx');
                    break;
                case 2:
                    return Excel::download(new DosExport($tipo_reporte), 'encuesta2.xlsx');
                    break;
                case 3:
                    return Excel::download(new TresExport($tipo_reporte), 'encuesta3.xlsx');
                    break;
                case 4:
                    return Excel::download(new CuatroExport($tipo_reporte), 'encuesta4.xlsx');
                    break;
                case 5:
                    return Excel::download(new CincoExport($tipo_reporte), 'test_ISO_1.xlsx');
                    break;
                case 6:
                    return Excel::download(new SeisExport($tipo_reporte), 'test_ISO_2.xlsx');
                    break;
                case 7:
                    return Excel::download(new SieteExport($tipo_reporte), 'test_ISO_3.xlsx');
                    break;
                case 8:
                    return Excel::download(new OchoExport($tipo_reporte), 'test_ISO_4.xlsx');
                    break;
            }
        }
    }
}
