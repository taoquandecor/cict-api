<?php

namespace Export\Traits\Excel;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

trait Style
{
    public function styles(Worksheet $sheet)
    {
        return [
            'A1' => ['font' => ['size' => 16]],
        ];
    }
}
