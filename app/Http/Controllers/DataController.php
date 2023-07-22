<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        return view('/data', [
            "title" => "Data",
            "weather2018" => Weather::whereYear('date', '=', '2018')->get(),
            "weather2019" => Weather::whereYear('date', '=', '2019')->get(),
            "weather2020" => Weather::whereYear('date', '=', '2020')->get(),
            "weather2021" => Weather::whereYear('date', '=', '2021')->get(),
            "weather2022" => Weather::whereYear('date', '=', '2022')->get(),
            "weather2023" => Weather::whereYear('date', '=', '2023')->get(),
        ]);
    }
}
