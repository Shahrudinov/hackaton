<?php
/**
 * Created by PhpStorm.
 * User: shama
 * Date: 17.11.18
 * Time: 14:33
 */

namespace App\Services;


use App\Book;
use App\BookRequest;
use App\Mail\BookAllowed;
use App\Models\User;
use App\UserBook;
use Illuminate\Support\Facades\Mail;

class ReturnBookService
{
    /**
     * @param User $user
     * @param Book $book
     * @param int|null $count
     * @throws \Exception
     */
    public function returnBook(User $user, Book $book, int $count = null): void
    {
        // Send email if user wait for book
        if ($book->count === 0) {
            $nullBooksRequests = BookRequest::oldest()
                ->where('book_id', $book->id)
                ->where('completed', false)
                ->get(['user_id']);

            Mail::to(User::find($nullBooksRequests->user_id))->send(new BookAllowed($book));
        }

        $userBook = UserBook::where([
           'user_id' => $user->id,
           'book_id' => $book->id
        ])->first();
        if ($count) {
            $book->count += $count;
            $userBook->count -= $count;
            $userBook->save();
        } else {
            $book->count += $userBook->count;
        }
        $book->save();
        if ($userBook->count < 1) {
            $userBook->delete();
        }
    }

    /**
     * @param User $user
     * @throws \Exception
     */
    public function returnAll(User $user): void
    {
        $userBooks = UserBook::where([
            'user_id' => $user->id,
        ]);

        foreach ($userBooks as $userBook) {
            $book = Book::find($userBook->book_id);
            $this->returnBook($user, $book);
        }
        $user->books()->delete();
    }
}
