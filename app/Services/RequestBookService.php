<?php

namespace App\Services;


use App\Book;
use App\BookRequest;
use App\Models\User;

class RequestBookService
{

    /**
     * @param User $user
     * @param Book $book
     */
    public function createRequest(User $user, Book $book)
    {
        $bookRequest = new BookRequest();

        $bookRequest->user($user);
        $bookRequest->book($book);

        $bookRequest->save();
    }

    /**
     * @param BookRequest $bookRequest
     */
    public function done(BookRequest $bookRequest)
    {
        $book = Book::findOrFail($bookRequest->book->id);
        if ($book->count < $bookRequest->count) {
            return false;
        }
        $book->count -= $bookRequest->count;
        $book->save();
        $user = User::findOrFail($bookRequest->user->id);
        $user->books()->create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'count' => $bookRequest->count,
            'return_date' => $bookRequest->return_date,
            'status' => 'TAKEN'
        ]);

        $bookRequest->completed = true;

        $bookRequest->save();
        return true;
    }

    /**
     * @param BookRequest $bookRequest
     */
    public function cancel(BookRequest $bookRequest)
    {
        $bookRequest->completed = true;
        $bookRequest->save();
    }
}
