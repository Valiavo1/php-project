<?php

namespace App\Http\Controllers;

set_time_limit(0);

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\EmploiDuTemps;
use DateTime;
use DateInterval;

class PdfController extends Controller
{
    public function doExportEdt()
    {
        

        $pdf = PDF::loadView('pdfExport.edt');
        PDF::setOptions([
            "defaultPaperSize" => "a4",
            "dpi" => 150,
            "orientation" => "landscape"
        ]);
        return $pdf->stream('emploiDuTemps.pdf');
    }
}
