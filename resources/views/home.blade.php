@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow1">
                <div class="card-header">Кабінет користувача</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                        <p>У вас ще немає статей</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
