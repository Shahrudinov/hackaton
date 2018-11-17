<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort');

        switch ($sort) {
            case 'date':
                $books = Book::orderBy('created_at', 'desc');
                break;
            default:
                $books = Book::orderBy('title', 'asc');
        }

        $books = $books->paginate(51);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        try {
            DB::transaction(function () use ($book, $request) {
                $book->requests()->create([
                    'user_id' => Auth::user()->id,
                    'book_id' => $book->id,
                    'count' => $request->count,
                    'completed' => false,
                    'return_date' => $request->return_date,
                    'comments' => $request->comment,
                ]);
            });
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Auth::user()->requests()->where([
            'book_id' => $book->id,
        ])->delete();
        return back();
    }
}
