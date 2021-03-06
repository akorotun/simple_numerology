<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\NumberFate;
use App\Models\NumberForecast;
use App\Models\NumberSpirit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NumerologyCalculatorsController extends Controller
{
    public function index()
    {
        $data = ['title'=>'Нумерологічні онлайн калькулятори'];
        return view('calculators.index')->with($data);
    }


    public function fate_spirit()
    {
        $day_b = (int)$_POST['day_b'];
        $month_b = (int)$_POST['month_b'];
        $year_b = (int)$_POST['year_b'];
        $fate_spirit = [$day_b, $month_b, $year_b];

        $number_fate = NumberFate::sum_numbers($fate_spirit);//визвали функцію для підрахунку суми по даті народження
        $number_fate_detail = NumberFate::where('number', $number_fate)->first();

        $number_spirit = NumberSpirit::sum_number($day_b);//визвали функцію для підрахунку суми по дню народження
        $number_spirit_detail = NumberSpirit::where('number', $number_spirit)->first();

        $data = [
            'title'=>'Число долі та Душі',
            'number_fate' => $number_fate,
            'number_spirit' => $number_spirit,
            'day_b' => $day_b,
            'month_b' => $month_b,
            'year_b' => $year_b,
            'number_fate_detail' => $number_fate_detail,
            'number_spirit_detail' => $number_spirit_detail
        ];
        return view('calculators.fate_spirit')->with($data);
    }

    public function forecast()
    {
        $day_b = (int)$_POST['day_b'];
        $month_b = (int)$_POST['month_b'];
        $year_forecast = (int)$_POST['year_forecast'];
        $forecast = [$day_b, $month_b, $year_forecast];

        $number_forecast = NumberFate::sum_numbers($forecast);//вызвали функцию для подсчета конечного числа из массива чисел.

        $number_forecast_detail = NumberForecast::where('number', $number_forecast)->first();

        $data = [
            'title'=>'Нумерологічний прогноз',
            'number_forecast' => $number_forecast,
            'day_b' => $day_b,
            'month_b' => $month_b,
            'year_forecast' => $year_forecast,
            'number_forecast_detail' => $number_forecast_detail
        ];
//        var_dump($number_forecast);
//        die();
        return view('calculators.forecast')->with($data);
    }
}
