@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Book</div>
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
                                    <th>User</th>
                                    <th>Book</th>
                                    <th>Count</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($requests as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <a href="{{url()->route('users.show', ['id' => $item->user()->first()->id])}}">
                                                {{ $item->user->email }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{url()->route('book.show', ['id' => $item->book()->first()->id])}}">
                                                {{ $item->book->title }}
                                            </a>
                                        </td>
                                        <td>
                                            {{$item->count}}
                                        </td>
                                        <td>
                                            <a href="{{ url()->route('request-book.done', ['id' => $item->id]) }}" title="Done">
                                                <button class="btn btn-success btn-sm">Done</button>
                                            </a>
                                            <a href="{{ url()->route('request-book.cancel', ['id' => $item->id])  }}" title="Cancel">
                                                <button class="btn btn-danger btn-sm">Cancel</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $requests->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
