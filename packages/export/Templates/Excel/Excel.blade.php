@include('Export::Excel.Header', ['ReportName' => $ReportName])

@include('Export::Excel.Parameters', ['Parameters' => $Parameters])

@include('Export::Excel.Content', ['ListData' => $ListData, 'Header' => $Header])
