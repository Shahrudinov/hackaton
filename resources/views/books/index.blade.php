@extends('layouts.app')

@section('content')

    <blockquote class="blockquote text-center">
        <div class="btn-group" role="group" aria-label="Basic example">
            @php
                if (\Illuminate\Support\Facades\Request::has('sort')) {
                $active = \Illuminate\Support\Facades\Request::get('sort');
                } else { $active = null; }
            @endphp
            <a href="?sort=stock" class="btn btn-outline-info {{$active === 'stock' ? 'active' : ''}}">В Наличии</a>
            <a href="?sort=title" class="btn btn-outline-info {{$active === 'title' ? 'active' : ''}}">По Названию</a>
            <a href="?sort=date" class="btn btn-outline-info {{$active === 'date' ? 'active' : ''}}">Сначала новые</a>

            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button"
                        class="btn btn-outline-info dropdown-toggle {{$active === 'category' ? 'active' : ''}}"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    По категории
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    @foreach(\App\Category::all() as $category)
                        <a class="dropdown-item"
                           href="?sort=category&category={{$category->id}}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </blockquote>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @if($books->isEmpty())
                    <h5>По указанным параметрам книги не найдены</h5>
                @endif
                @foreach ($books as $book)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top img-thumbnail"
                                 alt="Thumbnail [100%x225]" style="height: 425px; width: 100%; display: block;"
                                 src="{{ $book->image }}"
                                 data-holder-rendered="true"
                            >
                            <div class="card-body">
                                <p class="card-text">
                                <h4>{{ $book->title }}</h4>
                                {{ strlen($book->description) > 250 ? substr($book->description, 0, 250) . '...' : $book->description }}
                                <div class="alert alert-info text-sm-left mt-3" role="alert">
                                    В наличии: @if($book->count) {{ $book->count }}
                                    @else
                                        <span class="text-danger">нет</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('userBooks.show', $book) }}" type="button"
                                           class="btn btn-sm btn-outline-secondary">
                                            Подробнее
                                        </a>
                                    </div>
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
                                        Рейтинг: {{ round($estimate / ($users === 0 ? 1 : $users), 2)  }}  (Проголосовали: {{ $users }})
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection