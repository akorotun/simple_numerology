@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')

    <h3 class="mb-2 p-2">Створення нової статті</h3>

    <div class="row mb-2">
        <div class="col-md-12">

                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative shadow1">

                        <div class="col p-4 d-flex flex-column position-static">

                            {!! Form::open(['action' => 'ArticlesController@store', 'method' => 'POST']) !!}
                                <div class="form-group mb-3">
                                    {{ Form::label('name', 'Назва статті') }}
                                    {{ Form::text('name', '',
                                        ['class'=>'form-control',
                                        'placeholder'=>'Введіть назву статті']) }}
                                </div>

                                <div class="form-group mb-3">
                                    {{ Form::label('title', 'Коротка інформація (intro статті)') }}
                                    {{ Form::text('title', '',
                                        ['class'=>'form-control',
                                        'placeholder'=>'Введіть intro статті']) }}
                                </div>

                                <div class="form-group mb-3">
                                    {{ Form::label('text', 'Текст статті') }}
                                    {{ Form::textarea('text', '',
                                        ['id'=>'editor',
                                        'placeholder'=>'Введіть текст статті']) }}
                                </div>

                                {{ Form::submit('Додати', ['class'=>'btn btn-success']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
        </div>

        <!-- <aside></aside> -->

    </div>


    <main role="main" class="container">


    </main><!-- /.container -->

@endsection

