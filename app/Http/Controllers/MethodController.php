<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;
use Matrix\Matrix;

// require '/../vendor/autoload.php';

class MethodController extends Controller
{
    public function index()
    {
        // total rows and column
        $totalRows = Weather::count();
        $totalTemperature = Weather::sum('temperature');
        $totalHumidity = Weather::sum('humidity');
        $totalWindspeed = Weather::sum('windspeed');
        $totalSunshine = Weather::sum('sunshine');
        $totalRaingauge = Weather::sum('raingauge');

        // square of temperature
        $temperatures = Weather::pluck('temperature');
        $totalSquaredTemperature = 0;

        foreach ($temperatures as $temperature) {
            $squaredTemperature = pow($temperature, 2);
            $totalSquaredTemperature += $squaredTemperature;
        }

        // square of humidity
        $humidity = Weather::pluck('humidity');
        $totalSquaredHumidity = 0;

        foreach ($humidity as $humidity) {
            $squaredHumidity = pow($humidity, 2);
            $totalSquaredHumidity += $squaredHumidity;
        }

        // square of windspeed
        $windspeed = Weather::pluck('windspeed');
        $totalSquaredWindspeed = 0;

        foreach ($windspeed as $windspeed) {
            $squaredWindspeed = pow($windspeed, 2);
            $totalSquaredWindspeed += $squaredWindspeed;
        }

        // square of sunshine
        $sunshine = Weather::pluck('sunshine');
        $totalSquaredSunshine = 0;

        foreach ($sunshine as $sunshine) {
            $squaredSunshine = pow($sunshine, 2);
            $totalSquaredSunshine += $squaredSunshine;
        }

        // multiplication between columns
        $results = Weather::selectRaw('SUM(temperature * raingauge) as temperature_raingauge_total')
            ->selectRaw('SUM(humidity * raingauge) as humidity_raingauge_total')
            ->selectRaw('SUM(windspeed * raingauge) as windspeed_raingauge_total')
            ->selectRaw('SUM(sunshine * raingauge) as sunshine_raingauge_total')
            ->selectRaw('SUM(temperature * humidity) as temperature_humidity_total')
            ->selectRaw('SUM(temperature * windspeed) as temperature_windspeed_total')
            ->selectRaw('SUM(temperature * sunshine) as temperature_sunshine_total')
            ->selectRaw('SUM(humidity * windspeed) as humidity_windspeed_total')
            ->selectRaw('SUM(humidity * sunshine) as humidity_sunshine_total')
            ->selectRaw('SUM(windspeed * sunshine) as sunshine_windspeed_total')
            ->get();

        $temperatureRaingaugeTotal = $results[0]->temperature_raingauge_total;
        $humidityRaingaugeTotal = $results[0]->humidity_raingauge_total;
        $windspeedRaingaugeTotal = $results[0]->windspeed_raingauge_total;
        $sunshineRaingaugeTotal = $results[0]->sunshine_raingauge_total;
        $temperatureHumidityTotal = $results[0]->temperature_humidity_total;
        $temperatureWindspeedTotal = $results[0]->temperature_windspeed_total;
        $temperatureSunshineTotal = $results[0]->temperature_sunshine_total;
        $humidityWindspeedTotal = $results[0]->humidity_windspeed_total;
        $humiditySunshineTotal = $results[0]->humidity_sunshine_total;
        $sunshineWindspeedTotal = $results[0]->sunshine_windspeed_total;

        // recently not use but in case looking for matrix H
        $gridH = [
            [$totalRaingauge],
            [$temperatureRaingaugeTotal],
            [$humidityRaingaugeTotal],
            [$windspeedRaingaugeTotal],
            [$sunshineRaingaugeTotal],
        ];

        // build matrix
        $gridA = [
            [$totalRows, $totalTemperature, $totalHumidity, $totalSunshine, $totalWindspeed],
            [$totalTemperature, $totalSquaredTemperature, $temperatureHumidityTotal, $temperatureSunshineTotal, $temperatureWindspeedTotal],
            [$totalHumidity, $temperatureHumidityTotal, $totalSquaredHumidity, $humiditySunshineTotal, $humidityWindspeedTotal],
            [$totalSunshine, $temperatureSunshineTotal, $humiditySunshineTotal, $totalSquaredSunshine, $sunshineWindspeedTotal],
            [$totalWindspeed, $temperatureWindspeedTotal, $humidityWindspeedTotal, $sunshineWindspeedTotal, $totalSquaredWindspeed],
        ];

        $gridA1 = [
            [$totalRaingauge, $totalTemperature, $totalHumidity, $totalSunshine, $totalWindspeed],
            [$temperatureRaingaugeTotal, $totalSquaredTemperature, $temperatureHumidityTotal, $temperatureSunshineTotal, $temperatureWindspeedTotal],
            [$humidityRaingaugeTotal, $temperatureHumidityTotal, $totalSquaredHumidity, $humiditySunshineTotal, $humidityWindspeedTotal],
            [$sunshineRaingaugeTotal, $temperatureSunshineTotal, $humiditySunshineTotal, $totalSquaredSunshine, $sunshineWindspeedTotal],
            [$windspeedRaingaugeTotal, $temperatureWindspeedTotal, $humidityWindspeedTotal, $sunshineWindspeedTotal, $totalSquaredWindspeed],
        ];

        $gridA2 = [
            [$totalRows, $totalRaingauge, $totalHumidity, $totalSunshine, $totalWindspeed],
            [$totalTemperature, $temperatureRaingaugeTotal, $temperatureHumidityTotal, $temperatureSunshineTotal, $temperatureWindspeedTotal],
            [$totalHumidity, $humidityRaingaugeTotal, $totalSquaredHumidity, $humiditySunshineTotal, $humidityWindspeedTotal],
            [$totalSunshine, $sunshineRaingaugeTotal, $humiditySunshineTotal, $totalSquaredSunshine, $sunshineWindspeedTotal],
            [$totalWindspeed, $windspeedRaingaugeTotal, $humidityWindspeedTotal, $sunshineWindspeedTotal, $totalSquaredWindspeed],
        ];

        $gridA3 = [
            [$totalRows, $totalTemperature, $totalRaingauge, $totalSunshine, $totalWindspeed],
            [$totalTemperature, $totalSquaredTemperature, $temperatureRaingaugeTotal, $temperatureSunshineTotal, $temperatureWindspeedTotal],
            [$totalHumidity, $temperatureHumidityTotal, $humidityRaingaugeTotal, $humiditySunshineTotal, $humidityWindspeedTotal],
            [$totalSunshine, $temperatureSunshineTotal, $sunshineRaingaugeTotal, $totalSquaredSunshine, $sunshineWindspeedTotal],
            [$totalWindspeed, $temperatureWindspeedTotal, $windspeedRaingaugeTotal, $sunshineWindspeedTotal, $totalSquaredWindspeed],
        ];

        $gridA4 = [
            [$totalRows, $totalTemperature, $totalHumidity, $totalRaingauge, $totalWindspeed],
            [$totalTemperature, $totalSquaredTemperature, $temperatureHumidityTotal, $temperatureRaingaugeTotal, $temperatureWindspeedTotal],
            [$totalHumidity, $temperatureHumidityTotal, $totalSquaredHumidity, $humidityRaingaugeTotal, $humidityWindspeedTotal],
            [$totalSunshine, $temperatureSunshineTotal, $humiditySunshineTotal, $sunshineRaingaugeTotal, $sunshineWindspeedTotal],
            [$totalWindspeed, $temperatureWindspeedTotal, $humidityWindspeedTotal, $windspeedRaingaugeTotal, $totalSquaredWindspeed],
        ];

        $gridA5 = [
            [$totalRows, $totalTemperature, $totalHumidity, $totalSunshine, $totalRaingauge],
            [$totalTemperature, $totalSquaredTemperature, $temperatureHumidityTotal, $temperatureSunshineTotal, $temperatureRaingaugeTotal],
            [$totalHumidity, $temperatureHumidityTotal, $totalSquaredHumidity, $humiditySunshineTotal, $humidityRaingaugeTotal],
            [$totalSunshine, $temperatureSunshineTotal, $humiditySunshineTotal, $totalSquaredSunshine, $sunshineRaingaugeTotal],
            [$totalWindspeed, $temperatureWindspeedTotal, $humidityWindspeedTotal, $sunshineWindspeedTotal, $windspeedRaingaugeTotal],
        ];

        $matrixA = new Matrix($gridA);
        $matrixA1 = new Matrix($gridA1);
        $matrixA2 = new Matrix($gridA2);
        $matrixA3 = new Matrix($gridA3);
        $matrixA4 = new Matrix($gridA4);
        $matrixA5 = new Matrix($gridA5);

        // determinant operation
        $detMatrixA = $matrixA->determinant();
        $detMatrixA1 = $matrixA1->determinant();
        $detMatrixA2 = $matrixA2->determinant();
        $detMatrixA3 = $matrixA3->determinant();
        $detMatrixA4 = $matrixA4->determinant();
        $detMatrixA5 = $matrixA5->determinant();

        // coefficien multiple linear regression
        $koefisienb0 = $detMatrixA1 / $detMatrixA;
        $koefisienb1 = $detMatrixA2 / $detMatrixA;
        $koefisienb2 = $detMatrixA3 / $detMatrixA;
        $koefisienb3 = $detMatrixA4 / $detMatrixA;
        $koefisienb4 = $detMatrixA5 / $detMatrixA;

        // for chartjs labels and datasets
        $dates = Weather::pluck('date');
        $dependents = Weather::pluck('raingauge');
        // predict data with model
        $weatherData = Weather::all();

        $predictResult = [];

        foreach ($weatherData as $data) {
            $x1 = $data->temperature;
            $x2 = $data->humidity;
            $x3 = $data->windspeed;
            $x4 = $data->sunshine;

            $y = $koefisienb0 + ($koefisienb1 * $x1) + ($koefisienb2 * $x2) + ($koefisienb3 * $x3) + ($koefisienb4 * $x4);

            $predictResult[] = $y;
        }

        return view('method', [
            "title" => "Method",
            "dates" => $dates,
            "dependents" => $dependents,
            "predictResult" => $predictResult,
            "temperatureRaingaugeTotal" => $temperatureRaingaugeTotal,
            "humidityRaingaugeTotal" => $humidityRaingaugeTotal,
            "windspeedRaingaugeTotal" => $windspeedRaingaugeTotal,
            "sunshineRaingaugeTotal" => $sunshineRaingaugeTotal,
            "temperatureHumidityTotal" => $temperatureHumidityTotal,
            "temperatureWindspeedTotal" => $temperatureWindspeedTotal,
            "temperatureSunshineTotal" => $temperatureSunshineTotal,
            "humidityWindspeedTotal" => $humidityWindspeedTotal,
            "humiditySunshineTotal" => $humiditySunshineTotal,
            "sunshineWindspeedTotal" => $sunshineWindspeedTotal,
            "totalSquaredTemperature" => $totalSquaredTemperature,
            "totalSquaredHumidity" => $totalSquaredHumidity,
            "totalSquaredWindspeed" => $totalSquaredWindspeed,
            "totalSquaredSunshine" => $totalSquaredSunshine,
            "totalRows" => $totalRows,
            "totalTemperature" => $totalTemperature,
            "totalHumidity" => $totalHumidity,
            "totalWindspeed" => $totalWindspeed,
            "totalSunshine" => $totalSunshine,
            "totalRaingauge" => $totalRaingauge,
            "matrixA" => $gridA,
            "matrixA1" => $gridA1,
            "matrixA2" => $gridA2,
            "matrixA3" => $gridA3,
            "matrixA4" => $gridA4,
            "matrixA5" => $gridA5,
            "detMatrixA" => $detMatrixA,
            "detMatrixA1" => $detMatrixA1,
            "detMatrixA2" => $detMatrixA2,
            "detMatrixA3" => $detMatrixA3,
            "detMatrixA4" => $detMatrixA4,
            "detMatrixA5" => $detMatrixA5,
            "koefisienb0" => $koefisienb0,
            "koefisienb1" => $koefisienb1,
            "koefisienb2" => $koefisienb2,
            "koefisienb3" => $koefisienb3,
            "koefisienb4" => $koefisienb4,
        ]);
    }
}
