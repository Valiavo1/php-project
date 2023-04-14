<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmploiDuTemps;
use DateTime;
use DateInterval;

class TableController extends Controller
{
    public function index()
    {
        return view('menu.table');
    }
}
