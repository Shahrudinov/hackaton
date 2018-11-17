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
                        <a href="{{ route('author.show', $author) }}" class="badge badge-info">
                            {{ $author->name }}
                        </a>
                    @endforeach
                </h6>
                <small class="text-muted">
                    @php
                        $estimate = 0;
                        $users = $book->reviews->count();
                        foreach ($book->reviews as $review) {
                            if ($review->stars) {
                                $estimate = $estimate + $review->stars;
                            } else {
                                $users--;
                            }
                        }
                    @endphp
                    Рейтинг: {{ round($estimate / ($users === 0 ? 1 : $users), 2)  }} (Проголосовали: {{ $users }})
                </small>
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
                    <label for="inputPassword" class="col-sm-2 col-form-label">Вопросы или пожелания</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="comment" name="comment" placeholder="">
                        </textarea>
                    </div>
                </div>
                <button class="btn btn-info" type="submit">
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

        <hr>

        <div class="comments">

            <h5>Отзывы: </h5>
            @if($book->reviews->isEmpty())
                Пока отзывов нет. Хотите быть первым?
            @else
                @foreach ($book->reviews as $review)
                    <div class="media">
                        {{--<img class="mr-3" src="..." alt="Generic placeholder image">--}}
                        <div class="media-body">
                            <a href="{{ route('profile.show', $review->user) }}">
                                <h5 class="mt-0">
                                    {{ $review->user->first_name }} {{ $review->user->last_name }}
                                </h5>
                            </a>
                            <p>
                                <small>Оценка: {{ $review->stars }}</small>
                            </p>
                            {{ $review->comment }}
                        </div>
                        <div class="media-body">
                            <small>{{ $review->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @endif
        </div>

        <hr>
        <form action="{{ route('review.store', $book) }}" method="post">
            <div class="form-group">
                <label for="comment">Комментарий: <span class="text-danger">*</span></label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>

            <div class="form-group">
                @for($i = 0; $i < 10; $i++)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stars" id="stars"
                               value="{{ $i+1 }}">
                        <label class="form-check-label" for="stars">{{ $i + 1 }}</label>
                    </div>
                @endfor
            </div>
            <button class="btn btn-success">
                Отправить
            </button>
            @csrf
        </form>
    </div>

@endsection