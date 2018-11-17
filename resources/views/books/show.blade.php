@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-6 pt-xl-4">
                <h3 class="font-weight-bold" id="text">
                    {{ $book->title }}
                </h3>
                <h6>
                    Авторы:
                    @foreach($book->authors as $author)
                        <a href="{{ route('author.show', $author) }}" class="badge badge-secondary">
                            {{ $author->name }}
                        </a>
                    @endforeach
                </h6>
                <p class="text-black-50 mt-md-4 mt-3">
                    {{ $book->description }}
                </p>
            </div>
            <div class="col-xl-6 mt-xl-0 mt-sm-5 mt-4 text-xl-left text-center">
                <img src="{{ $book->image }}">
            </div>
        </div>


        {{-- Если книга ещё не в списке брони --}}
        @if(!auth()->user()->requests->where('book_id', $book->id)->where('completed', false)->isEmpty())
            <form id="unbook" action="{{ route('userBooks.destroy', $book) }}" method="post">
                <button class="btn btn-outline-success disabled" disabled>Запрос отправлен</button>
                <button type="submit" class="btn btn-danger">Отменить</button>
                @csrf
                @method('delete')
                <hr>
                <div class="form-group row">
                    <label for="return_date" class="col-sm-2 col-form-label">Бронь до</label>
                    <div class="col-sm-10">
                        <input type="date"
                               class="form-control-plaintext"
                               id="return_date"
                               name="return_date"
                               value="{{ now()->addMonth(1) }}"
                               disabled
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="count" class="col-sm-2 col-form-label">Количество</label>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control-plaintext"
                               id="count"
                               name="count"
                               value="{{ auth()->user()->requests->where('book_id', $book->id)->first()->count }}"
                               disabled
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Комментарий</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="comment" name="comment" placeholder="" disabled>
                        </textarea>
                    </div>
                </div>
            </form>
        @else

            <form id="book" action="{{ route('userBooks.store', $book) }}" method="post">
                <div class="form-group row">
                    <label for="return_date" class="col-sm-2 col-form-label">Бронь до</label>
                    <div class="col-sm-10">
                        <input type="date"
                               class="form-control-plaintext"
                               id="return_date"
                               name="return_date"
                               value="{{ now()->addMonth(1) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="count" class="col-sm-2 col-form-label">Количество</label>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control-plaintext"
                               id="count"
                               name="count"
                               value="1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Комментарий</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="comment" name="comment" placeholder="">
                        </textarea>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">
                    @if(!$book->count) Забронировать @else Запросить книгу @endif
                </button>
                @csrf
            </form>
        @endif

        <div class="alert alert-info mt-3">
            В наличии:
            @if($book->count)
                {{ $book->count }}
            @else
                <span class="text-danger">нет</span><br>
                <small>Вы можете запросить книгу и при её появлении Вы будете уведомлены.</small>
            @endif
            <br>
            Запросили {{ $book->requests->count() }}
        </div>
    </div>
    <form id="unbook" action="{{ route('userBooks.destroy', $book) }}" method="post" hidden></form>
@endsection