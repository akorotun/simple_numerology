@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')

    <h4 class="mb-2 p-2">Для дати народження {{ $day_b }}.{{ $month_b }}.{{ $year_b }}</h4>
    <div class="row mb-2">
        <div class="col-md-12">

            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative bg-light shadow1">
                <div class="col p-4 d-flex flex-column position-static">
                    <h4 class="card-text mb-2">Число долі: {{ $number_fate }}. <i>(для перевірки номер з таблиці - {{ $number_fate_detail->number }})</i></h4>

                    <p class="card-text mb-2">{{ $number_fate_detail->general }}</p>
                    <p class="card-text mb-2"><b>Позитивні якості:</b> {{ $number_fate_detail->positive }}</p>
                    <p class="card-text mb-2"><b>Негативні якості:</b> {{ $number_fate_detail->negative }}</p>
                    <p class="card-text mb-2"><b>Відповідні професії:</b> {{ $number_fate_detail->professions }}</p>
                    <p class="card-text mb-2"><b>Сумісність:</b> {{ $number_fate_detail->compatibility }}</p>
                </div>
            </div>

            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative bg-light shadow1">
                <div class="col p-4 d-flex flex-column position-static">
                    <h4 class="card-text mb-3">Число душі: {{ $number_spirit }}. <i>(для перевірки номер з таблиці - {{ $number_spirit_detail->number }})</i></h4>
                    <p class="card-text mb-2">{!! $number_spirit_detail->general  !!}</p>
                    <img class="bd-placeholder-img rounded" width="250" height="200" src="/public/storage/images/{{ $number_spirit_detail->spirit_image }}">
                </div>
            </div>

        </div>



    </div>

@endsection

