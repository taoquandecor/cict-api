<?php

namespace Export\Traits\Excel;

trait ColumnWidth
{
    public function columnWidths(): array
    {
        return array_fill_keys($this->columns, self::COLUMN_WIDTH);
    }
}
