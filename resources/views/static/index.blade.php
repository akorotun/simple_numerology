@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')


        <div class="jumbotron p-4 p-md-4 text-white rounded bg1 shadow1">
            <div class="col-md-12 px-0">
                @if(count($articles) > 0)
                    @foreach($articles as $el)
                        @if($el->id == 1)
                            <h1 class="display-6 font-italic">{{ $el->name }}</h1>
                            <p class="lead my-3">{{ $el->title }}</p>
                            <p class="lead mb-0"><a href="/public/articles/{{ $el->id }}" class="text-white font-weight-bold">Читати далі...</a></p>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <h3 class="pl-2 mb-2">
            Останні статті<!-- з категорії - Проста нумерологія -->
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
                                <a href="/public/articles/{{ $el->id }}" class="stretched-link">Читати далі...</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">

                        <img class="bd-placeholder-img rounded" width="200" height="250"
                             src="/public/storage/images/{{ $el->image }}">

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
                <h5 class="pb-2 mb-2">
                    Якщо ви дійсно зацікавились,
                </h5>
                <p class="border-bottom">на нашому сайті можна скористатися <a class="p-1" href="/public/numerology_calc">нумерологічним онлайн калькулятором.</a></p>



                <div>
                    <h5 class="pb-2 mb-2">За допомогою нашого нумерологічного онлайн калькулятора, ви зможете розрахувати:</h5>
                    <ul>
                        <li>Число долі.<p class="font-italic">Нумерологи стверджують, що, знаючи своє число долі, можна налагодити всі сфери життя.</p></li>
                        <li>Число душі.<p class="font-italic">Число душі розкриває шлях, який людина вибирає собі. Це число діє протягом усього людського життя.</p></li>
                        <li>Число імені.<p class="font-italic">(в процесі розробки).</p></li>
                        <li>Нумерологічний прогноз.<p class="font-italic">Зробивши розрахунки за певним роком, ви дізнаєтеся, які події він може принести у ваше життя.</p></li>
                    </ul>
                </div><!-- /.blog-post -->


            </div><!-- /.blog-main -->

            <!-- <aside></aside> -->
            @include('.blocks.aside')

        </div><!-- /.row -->

    </main><!-- /.container -->

@endsection

