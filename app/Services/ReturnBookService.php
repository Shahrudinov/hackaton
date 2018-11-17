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

class ReturnBookService
{
    public function returnBook(User $user, Book $book)
    {

        $user->books()->delete($book);
    }
}
