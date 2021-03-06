<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Models\User;
use App\Services\ReturnBookService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;


class ReaderController extends Controller
{


    public function index(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 15;

        $query = User::has('books');

        if (!empty($keyword)) {
            $query = $query
                ->where('name', 'LIKE', "%$keyword%")
                ->orWhere('label', 'LIKE', "%$keyword%")
                ->latest();
        } else {
            $query = User::has('books')->latest();
        }

        $readers = $query->paginate($perPage);

        return view('admin.reader.index', compact('readers'));
    }

    public function returnBook(Request $request, ReturnBookService $returnBookService)
    {
        $user = User::find($request->get('user'));
        $book = Book::find($request->get('book'));
        $count = $request->get('count');

        $returnBookService->returnBook($user, $book, $count);

        Alert::success('Success');
        return redirect()->back();

    }

    public function returnAll(int $id, ReturnBookService $returnBookService)
    {
        $user = User::findOrFail($id);
        $returnBookService->returnAll($user);
        Alert::success('All books returned');
    }
}
