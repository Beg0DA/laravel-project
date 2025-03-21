@extends('layouts/main_layout')

@section('content')
    <main class="container">
        <div class="cover-container w-100 h-100 p-3 mx-auto text-center">
            <div class="px-3">
                <h1 style="color: #1AA7EC;">Создавайте и проводите онлайн-опросы легко и быстро</h1>
                <p class="lead" style="color: #1AA7EC;">Наша платформа предоставляет все необходимые инструменты для создания профессиональных опросов, сбора данных и анализа результатов. Начните бесплатно уже сегодня!</p>
                <p class="lead" style="color: #1AA7EC;">По всем вопросам и заявкам на создание голосования обращайтесь на почту: qandahub@mail.ru</p>
                <p class="lead">
                    <a href="{{route('login')}}" style="color: #eaf0f1; background: linear-gradient(#4fc3f7 30%, #80dfff); border: 0px" class="btn btn-outline-primary opacity fs-2 my-3 shadow-sm  p-3 px-5 rounded-pill">Перейти к голосованиям</a>
                </p>
            </div>
        </div>
    </main>
@endsection
