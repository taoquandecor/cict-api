<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QueryExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return [

        ];
    }

    public function headings(): array
    {
        return [

        ];
    }
}
