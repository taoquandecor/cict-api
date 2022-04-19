<?php

namespace Export\Traits\Excel;

use Maatwebsite\Excel\Events\AfterSheet;

trait Event
{
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                if (count($this->columns) > 0) {
                    $startRow = $this->GetFirstDataRow();
                    $lastColumn = end($this->columns);

                    $event->sheet->getDelegate()->setAutoFilter("A{$startRow}:{$lastColumn}{$startRow}");
                }
            }
        ];
    }
}
