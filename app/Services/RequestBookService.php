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
}
