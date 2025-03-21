<head>
    <title>Логин</title>
</head>
@extends('layouts/main_layout')

@section('content')
    <div class="container p-3">
        <h1 class="text-center mb-3 display-3" style="color: #1AA7EC;">Вход</h1>
        <form action="{{ route('auth') }}" method="POST" class="m-auto">
            @csrf
            <div class="mb-3">
                @if ($errors->any())
                    <div class="bg-danger rounded-pill p-3">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                            <br>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="login" class="form-label fs-5" style="color: #1AA7EC;">Логин</label>
                <input type="text" class="form-control shadow-sm  p-3 rounded-pill" id="login" name="login">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fs-5" style="color: #1AA7EC;">Пароль</label>
                <input type="password" class="form-control shadow-sm  p-3 rounded-pill" id="password" name="password">
            </div>
            <input type="submit" style="color: #eaf0f1; background: linear-gradient(#4fc3f7 30%, #80dfff); border: 0px" class="btn btn-primary  w-100 p-3 fs-2 rounded-pill shadow-sm" value="Войти">
        </form>
    </div>
@endsection
