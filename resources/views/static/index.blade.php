@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')


        <div class="jumbotron p-4 p-md-4 text-white rounded bg-secondary shadow1">
            <div class="col-md-12 px-0">
                @if(count($articles) > 0)
                    @foreach($articles as $el)
                        @if($el->id == 1)
                            <h1 class="display-4 font-italic">{{ $el->name }}</h1>
                            <p class="lead my-3">{{ $el->title }}</p>
                            <p class="lead mb-0"><a href="/public/articles/{{ $el->id }}" class="text-white font-weight-bold">Читать дальше...</a></p>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <h3 class="pl-2 mb-2 font-italic">
            Останні статті:
        </h3>
        <div class="row mb-2">
            @if(count($articles_last) > 0)
                @foreach($articles_last as $el)
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative bg-light shadow1">
                    <div class="col p-2 d-flex flex-column position-static">
                                <h3 class="mb-0">{{ $el->name }}</h3>
                                <div class="mb-1 text-muted">{{ $el->created_at }}</div>
                                <p class="card-text mb-auto">{{ $el->title }}</p>
                                <a href="/public/articles/{{ $el->id }}" class="stretched-link">Читати далі</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img rounded" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
@endsection


@section('content2')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h4 class="pb-2 mb-2 font-italic">
                    Если Вы действительно заинтересовались,
                </h4>
                <p class="border-bottom">на нашем сайте можно воспользоваться простым калькулятором для расчета (своих чисел - вставить текст другой).</p>



                <div>
                    <h4 class="pb-2 mb-2 font-italic">Для этого необходимо знать следующие данные:</h4>
                    <p>From Tokyo to Mexico, to Rio. Yeah, you take me to utopia. I'm walking on air. We'd make out in your Mustang to Radiohead. I mean the ones, I mean like she's the one. Sun-kissed skin so hot we'll melt your popsicle. Slow cooking pancakes for my boy, still up, still fresh as a Daisy.</p>
                    <ul>
                        <li>...</li>
                        <li>...</li>
                        <li>...</li>
                    </ul>
                    <p>Don't need apologies. Boy, you're an alien your touch so foreign, it's <em>supernatural</em>, extraterrestrial. Talk about our future like we had a clue. I can feel a phoenix inside of me.</p>
                </div><!-- /.blog-post -->

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled">Newer</a>
                </nav>

            </div><!-- /.blog-main -->

            <!-- <aside></aside> -->
            @include('.blocks.aside')

        </div><!-- /.row -->

    </main><!-- /.container -->

@endsection

