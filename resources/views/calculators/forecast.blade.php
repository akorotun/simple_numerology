@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')

    <h4 class="mb-2 p-2">Нумерологічний прогноз для дати народження {{ $day_b }}.{{ $month_b }} на {{ $year_forecast }} рік</h4>
    <div class="row mb-2">
        <div class="col-md-12">

            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative bg-light shadow1">
                <div class="col p-4 d-flex flex-column position-static">
                    <h4 class="card-text mb-2">Рік числа: {{ $number_forecast }}.<!-- <i>(для перевірки номер з таблиці - {{ $number_forecast_detail->number }})</i> --></h4>

                    <p class="card-text mb-2">{{ $number_forecast_detail->general }}</p>
                    <p class="card-text mb-2"><b>Здоров'я:</b> {{ $number_forecast_detail->health }}</p>
                    <p class="card-text mb-2"><b>Особове життя:</b> {{ $number_forecast_detail->personal_life }}</p>
                    <p class="card-text mb-2"><b>Фінанси та кар'єра:</b> {{ $number_forecast_detail->finance }}</p>
                </div>
            </div>

        </div>

    </div>

@endsection

