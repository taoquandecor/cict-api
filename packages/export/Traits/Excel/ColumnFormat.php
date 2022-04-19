<?php

namespace Export\Traits\Excel;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

trait ColumnFormat
{
    public function columnFormats(): array
    {
        $formats = [];

        if (is_null($this->data) || empty($this->data)) {
            return $formats;
        }

        $data = array_values((array) $this->data[0]);
        $letter = self::FIRST_COLUMN;

        for ($i = 0; $length = count($data), $i < $length; $i++) {
            if (is_float($data[$i])) {
                $formats[$letter] = NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1;
            }

            $letter++;
        }

        return $formats;
    }
}
