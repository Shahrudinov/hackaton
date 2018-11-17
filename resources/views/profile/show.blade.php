@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            {{ \App\Models\User::findOrFail($id)->first_name }} {{ \App\Models\User::findOrFail($id)->last_name }}
        </h1>
        <h4>
            {{ \App\Models\User::findOrFail($id)->email }}
        </h4>
        <hr>
        <h2>Сейчас читаю ({{ \App\Models\User::findOrFail($id)->books->count() }})</h2>
        <div class="list-group">
            @if(\App\Models\User::findOrFail($id)->books->count())
                @foreach (\App\Models\User::findOrFail($id)->books as $book)
                    <a href="{{ route('userBooks.show', $book->id) }}">
                        {{ $book->name }}
                    </a>
                @endforeach

            @else
                <span>Я ничего не читаю</span>
            @endif
        </div>

        <h2 class="mt-3">Запросы на получение ({{ \App\Models\User::findOrFail($id)->requests->count() }})</h2>
        <div class="list-group">
            @if(\App\Models\User::findOrFail($id)->requests->count())
                @foreach (\App\Models\User::findOrFail($id)->requests as $request)
                    <a href="{{ route('userBooks.show', $request->book->id) }}"
                       class="list-group-item list-group-item-action">
                        {{ $request->book->title }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection