<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TresExport implements FromCollection, WithHeadings, ShouldAutoSize
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

        $query = DB::select('call  encuesta3 (?)', array($tipo_reporte));
        $query = collect($query)->flatten(1);
        return $query;
    }


    public function headings(): array
    {
        return [
            'nombre_empresa', 'rut', 'cargo', 'meses_experiencia', 'unidad_desempeño', 'region', 'cantidad_trabajadores', 'id_encuesta3',	'id_usuario',	'p1-1',	'p1-2',	'p1-3',	'p2-1',	'p2-2',	'p2-3',	'p3-1',	'p3-2',	'p3-3',	'p4-1',	'p4-2',	'p4-3',	'p5-1',	'p5-2',	'p5-3',	'p6-1',	'p6-2',	'p6-3',	'p7-1',	'p7-2',	'p7-3',	'p8-1',	'p8-2',	'p8-3',	'p9-1',	'p9-2',	'p9-3',	'p10-1',	'p10-2',	'p10-3',	'p11-1',	'p11-2',	'p11-3',	'p12-1',	'p12-2',	'p12-3',	'p13-1'	,'p13-2',	'p13-3',	'p14-1',	'p14-2',	'p14-3',	'p15-1',	'p15-2',	'p15-3',
            'p1-4',
            'p2-4',
            'p3-4',
            'p4-4',
            'p5-4',
            'p6-4',
            'p7-4',
            'p8-4',
            'p9-4',
            'p10-4',
            'p11-4',
            'p12-4',
            'p13-4',
            'p14-4',
            'p15-4',            
            'fecha_ingreso'
        ];
    }
}
