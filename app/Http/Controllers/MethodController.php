<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

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
            ->selectRaw('SUM(windspeed * sunshine) as windspeed_sunshine_total')
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
        $windspeedSunshineTotal = $results[0]->windspeed_sunshine_total;

        $matrixA = [
            [$totalRows, $totalTemperature, $totalHumidity, $totalWindspeed, $totalSunshine],
            [$totalTemperature, $totalSquaredTemperature, $temperatureHumidityTotal, $temperatureWindspeedTotal, $temperatureSunshineTotal],
            [$totalHumidity, $temperatureHumidityTotal, $totalSquaredHumidity, $humidityWindspeedTotal, $humiditySunshineTotal],
            [$totalWindspeed, $temperatureWindspeedTotal, $humidityWindspeedTotal, $totalSquaredWindspeed, $windspeedSunshineTotal],
            [$totalSunshine, $temperatureSunshineTotal, $humiditySunshineTotal, $windspeedSunshineTotal, $totalSquaredSunshine],
        ];

        $matrixH = [
            [$totalRows],
            [$temperatureRaingaugeTotal],
            [$humidityRaingaugeTotal],
            [$windspeedRaingaugeTotal],
            [$sunshineRaingaugeTotal],
        ];

        $matrixA1 = [
            [$totalRows, $totalTemperature, $totalHumidity, $totalWindspeed, $totalSunshine],
            [$temperatureRaingaugeTotal, $totalSquaredTemperature, $temperatureHumidityTotal, $temperatureWindspeedTotal, $temperatureSunshineTotal],
            [$humidityRaingaugeTotal, $temperatureHumidityTotal, $totalSquaredHumidity, $humidityWindspeedTotal, $humiditySunshineTotal],
            [$windspeedRaingaugeTotal, $temperatureWindspeedTotal, $humidityWindspeedTotal, $totalSquaredWindspeed, $windspeedSunshineTotal],
            [$sunshineRaingaugeTotal, $temperatureSunshineTotal, $humiditySunshineTotal, $windspeedSunshineTotal, $totalSquaredSunshine],
        ];

        $matrixA2 = [
            [$totalRows, $totalRows, $totalHumidity, $totalWindspeed, $totalSunshine],
            [$totalTemperature, $temperatureRaingaugeTotal, $temperatureHumidityTotal, $temperatureWindspeedTotal, $temperatureSunshineTotal],
            [$totalHumidity, $humidityRaingaugeTotal, $totalSquaredHumidity, $humidityWindspeedTotal, $humiditySunshineTotal],
            [$totalWindspeed, $windspeedRaingaugeTotal, $humidityWindspeedTotal, $totalSquaredWindspeed, $windspeedSunshineTotal],
            [$totalSunshine, $sunshineRaingaugeTotal, $humiditySunshineTotal, $windspeedSunshineTotal, $totalSquaredSunshine],
        ];

        $matrixA3 = [
            [$totalRows, $totalTemperature, $totalRows, $totalWindspeed, $totalSunshine],
            [$totalTemperature, $totalSquaredTemperature, $temperatureRaingaugeTotal, $temperatureWindspeedTotal, $temperatureSunshineTotal],
            [$totalHumidity, $temperatureHumidityTotal, $humidityRaingaugeTotal, $humidityWindspeedTotal, $humiditySunshineTotal],
            [$totalWindspeed, $temperatureWindspeedTotal, $windspeedRaingaugeTotal, $totalSquaredWindspeed, $windspeedSunshineTotal],
            [$totalSunshine, $temperatureSunshineTotal, $sunshineRaingaugeTotal, $windspeedSunshineTotal, $totalSquaredSunshine],
        ];

        $matrixA4 = [
            [$totalRows, $totalTemperature, $totalHumidity, $totalRows, $totalSunshine],
            [$totalTemperature, $totalSquaredTemperature, $temperatureHumidityTotal, $temperatureRaingaugeTotal, $temperatureSunshineTotal],
            [$totalHumidity, $temperatureHumidityTotal, $totalSquaredHumidity, $humidityRaingaugeTotal, $humiditySunshineTotal],
            [$totalWindspeed, $temperatureWindspeedTotal, $humidityWindspeedTotal, $windspeedRaingaugeTotal, $windspeedSunshineTotal],
            [$totalSunshine, $temperatureSunshineTotal, $humiditySunshineTotal, $sunshineRaingaugeTotal, $totalSquaredSunshine],
        ];

        $matrixA5 = [
            [$totalRows, $totalTemperature, $totalHumidity, $totalWindspeed, $totalRows],
            [$totalTemperature, $totalSquaredTemperature, $temperatureHumidityTotal, $temperatureWindspeedTotal, $temperatureRaingaugeTotal],
            [$totalHumidity, $temperatureHumidityTotal, $totalSquaredHumidity, $humidityWindspeedTotal, $humidityRaingaugeTotal],
            [$totalWindspeed, $temperatureWindspeedTotal, $humidityWindspeedTotal, $totalSquaredWindspeed, $windspeedRaingaugeTotal],
            [$totalSunshine, $temperatureSunshineTotal, $humiditySunshineTotal, $windspeedSunshineTotal, $sunshineRaingaugeTotal],
        ];

        return view('method', [
            "title" => "Method",
            "total" => $totalSquaredHumidity,
        ]);
    }
}
