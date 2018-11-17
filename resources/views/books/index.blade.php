@extends('layouts.app')

@section('content')

    <blockquote class="blockquote text-center">
        <p class="mb-0">Последние поступления</p>
    </blockquote>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
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
                                <div class="alert alert-info text-sm-left" role="alert">
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
                                    <small class="text-muted">{{ $book->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection