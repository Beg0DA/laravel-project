@extends('layouts/main_layout')

@section('content')
    <main class="container">
        <h1 class="text-center mb-3 display-3" style="color: #1AA7EC;">Личный кабинет</h1>
        <p style="color: #1AA7EC;"><span class="fw-semibold">Имя: </span>{{ $user->name }}</p>
        <p style="color: #1AA7EC;"><span class="fw-semibold">Логин: </span>{{ $user->login }}</p>
        <p style="color: #1AA7EC;"><span class="fw-semibold">Email: </span>{{ $user->email }}</p>
        <p style="color: #1AA7EC;"><span class="fw-semibold">Аватар: </span>
        @if ($user->avatar!='')
        <img src="../storage/app/public/{{$user->avatar}}" width="300px" alt="Аватар"></p>
        @else 
        Нет аватара</p>
        @endif
        @if ($user->role=="1")
        <p style="color: #1AA7EC;"><span class="fw-semibold">Вы администратор<a href="{{route('admin.new_form')}}" style="color: #eaf0f1; background: linear-gradient(#4fc3f7 30%, #80dfff); border: 0px" class="btn btn-primary rounded-pill mx-2 shadow-sm">Создать голосование</a></p>
        
        @endif
        <div class="cards">
            <h2 class="text-center mb-3 display-5" style="color: #1AA7EC;">Ваше участие в голосованиях</h2>
            @if ($votes->count() > 0)
                <ul class="list-group">
                    @foreach ($votes as $vote)
                        <li class="list-group-item">
                            <p style="color: #1AA7EC;"><b>Опрос:</b> {{ $vote->form->name }}</p>
                            <p style="color: #1AA7EC;"><b>Ваш выбор:</b> {{ $vote->choice->choice }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="card-text" style="color: #1AA7EC;">Вы еще не участвовали в голосованиях.</p>
            @endif
    </main>
@endsection