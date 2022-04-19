<?php

namespace Export;

use Export\Traits\Excel\ColumnFormat;
use Export\Traits\Excel\ColumnWidth;
use Export\Traits\Excel\Event;
use Export\Traits\Excel\ExcelView;
use Export\Traits\Excel\Style;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;

class ExportExcelService implements FromView, WithColumnFormatting, WithEvents, WithColumnWidths, WithStyles, ShouldAutoSize
{
    use ColumnFormat, ExcelView, Event, ColumnWidth, Style;

    // include Header + Execution date time.
    const FIRST_DATA_ROW = 5;

    //First row to export
    const FIRST_COLUMN = "A";

    //Default column width
    const COLUMN_WIDTH = 17;

    //Report name
    private $name = "Default Report";

    //Report parameters
    private $parameters = [];

    //Report data
    private $data = [];

    //Report Header
    private $header = [];

    //List column
    private $columns = [];

    public function __construct($reportName, $parameters, $data)
    {
        $this->name = $reportName;
        $this->parameters = $parameters;
        $this->data = $data;
        $this->GetHeader();
        $this->GetListColumns();
    }

    private function GetHeader()
    {
        if (is_null($this->data) || empty($this->data)) {
            return $this->header = [];
        }

        return $this->header = array_keys((array) $this->data[0]);
    }

    private function GetListColumns($letter = self::FIRST_COLUMN)
    {
        for ($i = 0; $i < $this->GetDataSize(); $i++) {
            $this->columns[] = $letter;
            $letter++;
        }
    }

    private function GetFirstDataRow($row = self::FIRST_DATA_ROW)
    {
        return $row + count($this->parameters);
    }

    private function GetDataSize()
    {
        return count($this->header);
    }
}
