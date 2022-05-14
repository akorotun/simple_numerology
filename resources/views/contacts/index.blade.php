@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow1">
                    <h5 class="card-header">Вхідні повідомлення</h5>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(Auth::user()->is_admin)

                            @if(count($contacts) > 0)

                                @foreach($contacts as $el)
                                    <div class="col p-0 d-flex flex-column position-static">
                                        <div class="mb-1 text-muted">{{ $el->created_at }}</div>
                                        <div class="mb-1 text-muted">{{ $el->name }}, {{ $el->email }}</div>
                                        <div class="card-text mb-auto">{!! $el->text !!}</div>
                                    </div><hr>

                                @endforeach
                            @else
                                <p>Повідомлення відсутні</p>
                            @endif

                        @else
                            <p>Ви не маєте право на перегляд вхідних повідомлень</p>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
