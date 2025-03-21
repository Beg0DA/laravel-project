@extends('layouts/main_layout')

@section('content')
<input type="text" name="search" style="color: #1AA7EC; opacity: 0.7;" class="form-control shadow-sm my-4 p-2 rounded-pill" placeholder="Поиск по названию...">
    @foreach ($activePolls as $form)
    <div class="poll-container">
        <h2 style="color: #1AA7EC;">{{ $form->name }}</h2>
        @if ($form->status === 'active')
            @if (!Auth::user()->hasVoted($form))
                <form action="{{ route('polls.vote', $form) }}" method="POST">
                    @csrf
                    @foreach ($form->choices as $choice)
                        <div>
                            <input type="radio" name="choice" value="{{ $choice->id }}" id="choice_{{ $choice->id }}">
                            <label style="color: #1AA7EC;" for="choice_{{ $choice->id }}">{{ $choice->choice }}</label>
                        </div>
                    @endforeach
                    <button type="submit" style="color: #eaf0f1; background: linear-gradient(#4fc3f7 30%, #80dfff); border: 0px" class="btn btn-primary rounded-pill shadow-sm my-3">Проголосовать</button>
                </form>
            @else
                <p style="color: #1AA7EC;">Вы уже голосовали в этом опросе.</p>
            @endif
            @if (Auth::user()->isAdmin())
                <form action="{{ route('admin.form_finish', $form->id) }}" method="POST">
                    @csrf
                    <button type="submit" style="color: #eaf0f1; background: linear-gradient(#4fc3f7 30%, #80dfff); border: 0px" class="btn btn-primary rounded-pill shadow-sm my-1">Завершить голосование</button>
                </form>
            @endif
        @endif
         </div>
    @endforeach
    @foreach ($finishedPolls as $form)
    <div class="poll-container">
        <h2 style="color: #1AA7EC;">{{ $form->name }}</h2>
        @if ($form->status === 'finished')
            <h3 style="color: #1AA7EC;">Результаты голосования:</h3>
            <ul>
                @foreach ($form->choices as $choice)
                    <li style="color: #1AA7EC;">{{ $choice->choice }} - {{ $choice->votes->count() }}
                    @php
                    $voteCount = $choice->votes->count(); 
                    @endphp
                    @if ($voteCount % 10 == 1 && $voteCount % 100 != 11)
                    голос
                    @elseif (in_array($voteCount % 10, [2, 3, 4]) && !in_array($voteCount % 100, [12, 13, 14]))
                    голоса
                    @else
                    голосов
                    @endif
                    </li>
                @endforeach
            </ul>
        @endif
         </div>
    @endforeach
@endsection
