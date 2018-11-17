@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Сейчас читаю ({{ auth()->user()->books->count() }})</h2>
        <div class="list-group">
            @if(auth()->user()->books->count())
                @foreach (auth()->user()->books as $book)
                    <a href="{{ route('userBooks.show', $book->id) }}">
                    {{ $book->name }}
                </a>
                @endforeach

                @else
                <span>Я ничего не читаю</span>
            @endif
        </div>

        <h2 class="mt-3">Запросы на получение ({{ auth()->user()->requests->count() }})</h2>
        <div class="list-group">
            @if(auth()->user()->requests->count())
                @foreach (auth()->user()->requests as $request)
                    <a href="{{ route('userBooks.show', $request->book->id) }}"
                       class="list-group-item list-group-item-action">
                        {{ $request->book->title }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection