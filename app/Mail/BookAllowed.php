<?php

namespace App\Mail;

use App\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookAllowed extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $book;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
        $this->subject = 'Заказ на книгу ' . $book->title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.allowed_book');
    }
}
