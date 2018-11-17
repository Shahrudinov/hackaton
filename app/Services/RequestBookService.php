<?php

namespace App\Services;


use App\Book;
use App\BookRequest;
use App\Models\User;

class RequestBookService
{
    public function createRequest(User $user, Book $book)
    {
        $bookRequest = new BookRequest();

        $bookRequest->user($user);
        $bookRequest->book($book);

        $bookRequest->save();
    }

    public function done(BookRequest $bookRequest)
    {
        $book = Book::findOrFail($bookRequest->book()->id);
        $book->count = $book->count - 1;
        $book->save();
        $user = User::findOrFail($bookRequest->user()->id);
        $user->books()->save($book);
        BookRequest::deleted($bookRequest);
    }
}
