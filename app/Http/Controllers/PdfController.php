<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function doExportEdt()
    {
        $currentDate = new DateTime();
        $currentDay = $currentDate->format('N');
        $daysUntilMonday = 1 - $currentDay;
        $nextMonday = $currentDate->modify("+$daysUntilMonday days");
        $date = $nextMonday->format('Y-m-d');
        dd($date);
        $L1 = array();
        for ($i = 0; $i < 6; $i++) {
            $L1[$i] = $edts = EmploiDuTemps::with('professeur', 'salle')
                                            ->join('classes', 'classes.id', '=', 'emploi_du_temps.id_classe')
                                            ->select('emploi_du_temps.*', 'classes.*')
                                            ->where('classes.niveau', 'LIKE', "L1")
                                            ->where('emploi_du_temps.date', '=', $date)
                                            ->get();

            $dateObj = new DateTime($date);
            $dateObj->add(new DateInterval('P1D'));
            $newDate = $dateObj->format('Y-m-d');
            $date = $newDate;
        }

        $date = $nextMonday->format('Y-m-d');
        $L2 = array();
        for ($i = 0; $i < 6; $i++) {
            $L2[$i] = $edts = EmploiDuTemps::with('professeur', 'salle')
                                            ->join('classes', 'classes.id', '=', 'emploi_du_temps.id_classe')
                                            ->select('emploi_du_temps.*', 'classes.*')
                                            ->where('classes.niveau', 'LIKE', "L2")
                                            ->where('emploi_du_temps.date', '=', $date)
                                            ->get();

            $dateObj = new DateTime($date);
            $dateObj->add(new DateInterval('P1D'));
            $newDate = $dateObj->format('Y-m-d');
            $date = $newDate;
        }

        $date = $nextMonday->format('Y-m-d');
        $L3 = array();
        for ($i = 0; $i < 6; $i++) {
            $L3[$i] = $edts = EmploiDuTemps::with('professeur', 'salle')
                                            ->join('classes', 'classes.id', '=', 'emploi_du_temps.id_classe')
                                            ->select('emploi_du_temps.*', 'classes.*')
                                            ->where('classes.niveau', 'LIKE', "L3")
                                            ->where('emploi_du_temps.date', '=', $date)
                                            ->get();

            $dateObj = new DateTime($date);
            $dateObj->add(new DateInterval('P1D'));
            $newDate = $dateObj->format('Y-m-d');
            $date = $newDate;
        }

        $date = $nextMonday->format('Y-m-d');
        $M1 = array();
        for ($i = 0; $i < 6; $i++) {
            $M1[$i] = $edts = EmploiDuTemps::with('professeur', 'salle')
                                            ->join('classes', 'classes.id', '=', 'emploi_du_temps.id_classe')
                                            ->select('emploi_du_temps.*', 'classes.*')
                                            ->where('classes.niveau', 'LIKE', "M1")
                                            ->where('emploi_du_temps.date', '=', $date)
                                            ->get();

            $dateObj = new DateTime($date);
            $dateObj->add(new DateInterval('P1D'));
            $newDate = $dateObj->format('Y-m-d');
            $date = $newDate;
        }

        $date = $nextMonday->format('Y-m-d');
        $M2 = array();
        for ($i = 0; $i < 6; $i++) {
            $M2[$i] = $edts = EmploiDuTemps::with('professeur', 'salle')
                                            ->join('classes', 'classes.id', '=', 'emploi_du_temps.id_classe')
                                            ->select('emploi_du_temps.*', 'classes.*')
                                            ->where('classes.niveau', 'LIKE', "M2")
                                            ->where('emploi_du_temps.date', '=', $date)
                                            ->get();

            $dateObj = new DateTime($date);
            $dateObj->add(new DateInterval('P1D'));
            $newDate = $dateObj->format('Y-m-d');
            $date = $newDate;
        }

        $data = [
            'L1' => $L1,
            'L2' => $L2,
            'L3' => $L3,
            'M1' => $M1,
            'M2' => $M2
        ];

        $pdf = PDF::loadView('pdfExport.edt', $data);
        PDF::setOptions([
            "defaultPaperSize" => "a4",
            "dpi" => 150,
        ]);
        return $pdf->stream('emploiDuTemps.pdf');
    }
}
