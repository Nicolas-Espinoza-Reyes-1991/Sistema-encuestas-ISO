<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CincoExport implements FromCollection, WithHeadings, ShouldAutoSize
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

        $query = DB::select('call  encuesta5 (?)', array($tipo_reporte));
        $query = collect($query)->flatten(1);
        return $query;
    }


    public function headings(): array
    {
        return [
            'nombre_empresa', 'rut', 'cargo', 'meses_experiencia', 'unidad_desempeño', 'region', 'cantidad_trabajadores',
                'p1',
                'p2',
                'p3',
                'p4',
                'p5',
                'p6',
                'p7',
                'p8',
                'p9',
                'p10',
                'p11',
                'p12',
                'p13',
                'p14',
                'p15',
                'p16',
                'p17',
                'p18',
                'p19',
                'p20',
                'fecha_ingreso'
        ];
    }
}
