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
    public function doExportEdt(Request $request)
    {
        if ($request->date) {
            $nextMonday = new \DateTime($request->date);
        } else {
            $currentDate = new \DateTime();
            $currentDay = $currentDate->format('N');
            $daysUntilMonday = 7 - $currentDay + 1;
            $nextMonday = $currentDate->modify("+$daysUntilMonday days");
        }
        $date = $nextMonday->format('Y-m-d');

        $edt = array();
        
        for ($j = 0; $j < 5; $j++) {
            switch ($j) {
                case 0:
                    $niveau = 'L1';
                    break;
                case 1:
                    $niveau = 'L2';
                    break;
                case 2:
                    $niveau = 'L3';
                    break;
                case 3:
                    $niveau = 'M1';
                    break;
                case 4:
                    $niveau = 'M2';
                    break;
            }
            for ($i = 0; $i < 6; $i++) {
                $edt[$j][$i] =  EmploiDuTemps::with('professeur', 'salle')
                                                ->join('classes', 'classes.id', '=', 'emploi_du_temps.id_classe')
                                                ->select('emploi_du_temps.*', 'classes.*')
                                                ->where('classes.niveau', 'LIKE', "%{$niveau}%")
                                                ->where('emploi_du_temps.date', '=', $date)
                                                ->get();
    
                $dateObj = new \DateTime($date);
                $dateObj->add(new \DateInterval('P1D'));
                $newDate = $dateObj->format('Y-m-d');
                $date = $newDate;
            }
            $date = $nextMonday->format('Y-m-d');
        }

        $data = [
            'edt' => $edt
        ];

        $formattedDate = $nextMonday->format("d/m/Y");
        $pdf = PDF::loadView('pdfExport.edt', $data);
        $pdf->setPaper(array(0, 0, 1000, 3500), 'portrait');
        return $pdf->stream('emploiDuTemps du '. $formattedDate .'pdf');
    }
}
