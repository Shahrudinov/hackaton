<?php
/**
 * Created by PhpStorm.
 * User: shama
 * Date: 17.11.18
 * Time: 14:33
 */

namespace App\Services;


use App\Book;
use App\Models\User;
use App\UserBook;

class ReturnBookService
{
    /**
     * @param User $user
     * @param Book $book
     * @throws \Exception
     */
    public function returnBook(User $user, Book $book): void
    {
        $userBook = UserBook::where([
           'user_id' => $user->id,
           'book_id' => $book->id
        ]);
        $book->count += $userBook->count;
        $book->save();
        $userBook->delete();
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
