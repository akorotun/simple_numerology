@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')

    <h3 class="mb-2 p-2"></h3>

    <div class="row mb-2">
        <div class="col-md-12">

                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative bg-light shadow1">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">Категорія 1</strong>
                            <h3 class="mb-0">{{ $article->name }}</h3>
                            <div class="mb-1 text-muted">{{ $article->created_at }}</div>
                            <p class="card-text mb-auto">{!! $article->text !!}</p>
                        </div>
                    </div>
                    <a href="/public/articles/{{ $article->id }}/edit" class="btn btn-secondary mb-2">Редагувати</a><br>

            {!! Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Видалити статтю', ['class' => 'btn btn-danger pl-2']) }}
            {!! Form::close() !!}

            <a href="/public/articles"><b>Назад</b></a>
        </div>

        <!-- <aside></aside> -->

    </div>


    <main role="main" class="container">


    </main><!-- /.container -->

@endsection

