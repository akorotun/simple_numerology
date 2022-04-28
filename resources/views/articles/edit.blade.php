@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')

    <h3 class="mb-2 p-2">Редагування статті</h3>

    <div class="row mb-2">
        <div class="col-md-12">

            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">

                <div class="col p-4 d-flex flex-column position-static">

                    {!! Form::open(['action' => ['ArticlesController@update', $article->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

                        <div class="form-group mb-3">
                            {{ Form::label('category', 'Категорія статті', ['class'=>'col-lg-2 p-0']) }}
                            {{ Form::select('category', [
                                                        $article->category => $article->category,
                                                        'категорія 2' => 'категорія 2',
                                                        'категорія 3' => 'категорія 3'],
                                                        '') }}
                        </div>

                        <div class="form-group mb-3">
                            {{ Form::label('name', 'Назва статті') }}
                            {{ Form::text('name', $article->name,
                                ['class'=>'form-control',
                                'placeholder'=>'Введіть назву статті']) }}
                        </div>

                        <div class="form-group mb-3">
                            {{ Form::label('title', 'Коротка інформація (intro статті)') }}
                            {{ Form::text('title', $article->title,
                                ['class'=>'form-control',
                                'placeholder'=>'Введіть intro статті']) }}
                        </div>

                        <div class="form-group mb-3">
                            {{ Form::label('text', 'Текст статті') }}
                            {{ Form::textarea('text', $article->text,
                                ['id'=>'editor',
                                'placeholder'=>'Введіть текст статті']) }}
                        </div>

                        <div class="form-group mb-3">
                            {{ Form::file('main_image') }}
                            <br><i>Примітка: пропорція файла 20/25</i>
                        </div>

                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::submit('Оновити', ['class'=>'btn btn-success']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <!-- <aside></aside> -->

    </div>


    <main role="main" class="container">


    </main><!-- /.container -->

@endsection

