<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UnoExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection


     */
    protected $tipo_reporte;

    function __construct($tipo_reporte)
    {
        $this->tipo_reporte = $tipo_reporte;
    }

    public function collection()
    {
        $tipo_reporte = $this->tipo_reporte;

        $query = DB::select('call  encuesta1 (?)', array($tipo_reporte));
        $query = collect($query)->flatten(1);
        return $query;
    }


    public function headings(): array
    {
        return [
           'nombre_empresa','rut', 'cargo', 'meses_experiencia', 'unidad_desempeño', 'region', 'cantidad_trabajadores', 'id_encuesta', 'id_usuario', 'p1', 'p2',	'p3',	'p4',	'p5',	'p6',	'p7',	'p8',	'p9',	'p10',	'p11',	'p12',	'p13',	'p14',	'p15',	'p16',	'p17',	'p18',	'p19',	'p20',	'p21',	'p22',	'p23',	'p24',	'p25',	'p26',	'p27',	'p28',	'p29',	'p30',	'p31',	'p32',	'p33',	'p34',	'p35',	'p36',	'p37',	'p38',	'p39',	'p40',	'p41',	'p42',	'p43',	'p44',	'p45',	'p46',	'p47',	'p48',	'fecha_ingreso'
        ];
    }
}
