@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Readers</div>
                    <div class="card-body">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/book', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>email</th>
                                    <th>books</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($readers as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <a href="{{url()->route('users.show', ['id' => $item->id])}}">
                                                {{ $item->email }}
                                            </a>
                                        </td>
                                            <td>
                                                @foreach($item->books as $userBook)
                                                <a href="{{url()->route('book.show', ['id' => $userBook->book_id])}}"
                                                   class="return-book"
                                                   data-user="{{$item->id}}"
                                                   data-title="{{ App\Book::find($userBook->book_id)->title }}"
                                                   data-count="{{ $userBook->count }}"
                                                   data-book="{{$userBook->book_id}}"
                                                    >
                                                    <span>{{ App\Book::find($userBook->book_id)->title }}</span>
                                                </a> - <span>{{ $userBook->count }}</span>, &nbsp;

                                                @endforeach
                                            </td>
                                        <td>
                                            <a href="{{ url()->route('reader.return-all', ['id' => $item->id]) }}" title="View Book"><button class="btn btn-success btn-sm">Return all</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $readers->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
