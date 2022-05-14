@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')
<div class="container mb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow1">
                <h5 class="card-header">Кабінет користувача</h5>

                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <span class="text-muted">{{ Auth::user()->name }}, {{ Auth::user()->email }}</span>
                        @if(Auth::user()->is_admin)
                            <a class="btn btn-sm btn-outline-secondary ml-1" href="/public/articles/create">Додати статтю</a>
                            <a class="btn btn-sm btn-outline-secondary ml-1" href="/public/contacts">Вхідні повідомлення</a>

                    </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow1">
                <h5 class="card-header">Статті автора:</h5>
                <div class="card-body">
                            @if(count($articles) > 0)

                                @foreach($articles as $el)
                                    <div class="col p-0 d-flex flex-column position-static">
                                        <h3 class="mb-0">{{ $el->name }}</h3>
                                        <div class="mb-1 text-muted">{{ $el->created_at }}</div>
                                        <p class="card-text mb-auto">{{ $el->title }}</p>
                                        <a href="/public/articles/{{ $el->id }}">Читати далі</a>
                                    </div><hr>

                                @endforeach
                            @else
                                <p class="text-monospace">У вас ще немає статей</p>
                            @endif

                        @else
                            <p class="text-monospace">Ви не маєте право додавати нові статті</p>

                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
