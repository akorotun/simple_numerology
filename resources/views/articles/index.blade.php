@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')

        <h3 class="mb-2 p-2">Всі статті</h3>

        <div class="row mb-2">
            <div class="col-md-8">
            @if(count($articles) > 0)
                @foreach($articles as $el)
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative bg-light shadow1">
                        <div class="col p-4 d-flex flex-column position-static">
                            <p class="mb-1 text-muted">Категорія: {{ $el->category }}</p>
                            <h3 class="mb-0">{{ $el->name }}</h3>
                            <div class="mb-1 text-muted">{{ $el->created_at }}</div>
                            <p class="card-text mb-auto">{{ $el->title }}</p>
                            <p class="d-inline-block mb-1 text-muted">Автор: {{ $el->user->name }}</p>
                            <a href="/public/articles/{{ $el->id }}" class="stretched-link">Читати далі...</a>
                        </div>
                        <div class="col-auto d-none d-lg-block align-self-center mr-1">
                            <img class="bd-placeholder-img rounded img-thumbnail" style="max-width: 300px" src="/public/storage/images/{{ $el->image }}" alt="">
                            <!-- <svg class="bd-placeholder-img rounded" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                                role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                focusable="false"><title>Placeholder</title><rect width="100%" height="100%"
                                fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg> 111 -->

                        </div>
                    </div>
                @endforeach
            @else <p class="card-text mb-auto">На даний час статті відсутні</p>
            @endif
            </div>

            <!-- <aside></aside> -->
            @include('.blocks.aside')

        </div>

@endsection

