<head>
    <title>Регистрация</title>
</head>
@extends('layouts/main_layout')

@section('content')
    <div class="container p-3">
        <h1 class="text-center mb-3 display-3" style="color: #1AA7EC;">Регистрация</h1>
        <form action="{{ route('user.store') }}" method="post" class="m-auto" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="bg-danger rounded p-3 text-white fs-5">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                        <br>
                    @endforeach
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label fs-5" style="color: #1AA7EC;">Имя</label>
                <input type="text" class="form-control shadow-sm  p-3 rounded-pill" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="login" class="form-label fs-5" style="color: #1AA7EC;">Логин</label>
                <input type="text" class="form-control shadow-sm  p-3 rounded-pill" id="login" name="login">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fs-5" style="color: #1AA7EC;">Адрес электронной почты</label>
                <input type="email" class="form-control shadow-sm  p-3 rounded-pill" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fs-5" style="color: #1AA7EC;">Пароль</label>
                <input type="password" class="form-control shadow-sm  p-3 rounded-pill" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="avatar" class="form-label fs-5" style="color: #1AA7EC;">Аватар</label>
                <input type="file" name="avatar" id="avatar" class="form-control-file" style="color: #1AA7EC;">
            </div>
            <input type="submit" class="btn btn-outline-primary mb-3 mt-3 w-100 shadow-sm  p-3 fs-2 rounded-pill " style="color: #eaf0f1; background: linear-gradient(#4fc3f7 30%, #80dfff); border: 0px"
                value="Зарегистрироваться">
        </form>
    </div>
    </body>
@endsection
