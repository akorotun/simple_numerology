@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')

    <h3 class="mb-2 p-2">Форма для відправлення повідомлень</h3>

    <div class="row mb-2">
        <div class="col-md-12">

            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative shadow1">

                <div class="col p-4 d-flex flex-column position-static">

                    {!! Form::open(['action' => 'ContactsController@store', 'method' => 'POST']) !!}

                    @guest
                        <div class="form-group mb-3">
                            {{ Form::label('name', "Ваше ім'я") }}
                            {{ Form::text('name', '',
                                ['class'=>'form-control',
                                'placeholder'=>"Введіть Ваше ім'я"]) }}
                        </div>
                    @else
                        <div class="form-group mb-3">
                            {{ Form::label('name', "Ваше ім'я") }}
                            {{ Form::text('name', Auth::user()->name,
                                ['class'=>'form-control']) }}
                        </div>
                    @endguest

                    @guest
                        <div class="form-group mb-3">
                            {{ Form::label('email', 'Ваш email') }}
                            {{ Form::email('email', '',
                                ['class'=>'form-control',
                                'placeholder'=>'Введіть Ваш email']) }}
                        </div>
                    @else
                        <div class="form-group mb-3">
                            {{ Form::label('email', 'Ваш email') }}
                            {{ Form::email('email', Auth::user()->email,
                                ['class'=>'form-control']) }}
                        </div>
                    @endguest

                    <div class="form-group mb-3">
                        {{ Form::label('subject', 'Тема повідомлення') }}
                        {{ Form::text('subject', '',
                            ['class'=>'form-control',
                            'placeholder'=>'Вкажіть тему повідомлення']) }}
                    </div>

                    <div class="form-group mb-3">
                        {{ Form::label('text', 'Текст повідомлення') }}
                        {{ Form::textarea('text', '',
                            ['id'=>'editor',
                            'placeholder'=>'Введіть текст повідомлення']) }}
                    </div>

                    {{ Form::submit('Відправити', ['class'=>'btn btn-success']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <!-- <aside></aside> -->

    </div>

@endsection
