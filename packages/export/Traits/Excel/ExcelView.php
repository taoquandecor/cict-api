<?php

namespace Export\Traits\Excel;

use Illuminate\Contracts\View\View;

trait ExcelView
{
    public function view(): View
    {
        return view('Export::Excel.Excel', [
            'ReportName' => $this->name,
            'Parameters' => $this->parameters,
            'ListData'   => $this->data,
            'Header'     => $this->header,
        ]);
    }
}
