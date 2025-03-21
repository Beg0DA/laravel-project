@extends('layouts/main_layout')

@section('content')
    <div class="container p-3">
        <h1 class="text-center mb-3 display-3" style="color: #1AA7EC;">Панель администратора</h1>
        <a href="{{route('admin.new_form')}}" style="color: #eaf0f1; background: linear-gradient(#4fc3f7 30%, #80dfff); border: 0px" class="btn btn-primary  w-100 p-3 fs-2 rounded-pill shadow-sm">Создать голосование</a>
    </div>
@endsection