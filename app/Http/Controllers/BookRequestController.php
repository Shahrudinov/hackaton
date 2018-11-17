<?php

namespace App\Http\Controllers;

use App\Book;
use App\Services\RequestBookService;
use Auth;
use Alert;
use Illuminate\Http\Request;

class BookRequestController extends Controller
{
    /**
     * @param Request $request
     * @param RequestBookService $requestBookService
     */
    public function create(Request $request, RequestBookService $requestBookService)
    {
       $user = Auth::user();
       $book = Book::findOrFail($request->get('book'));

       $requestBookService->createRequest($user, $book);

       Alert::success('You request sends to library');

    }
}
