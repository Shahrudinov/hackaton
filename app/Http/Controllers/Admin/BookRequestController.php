<?php

namespace App\Http\Controllers\Admin;

use App\BookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookRequestController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $requests = BookRequest::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $requests = BookRequest::latest()->paginate($perPage);
        }

        return view('admin.book.request', compact('requests'));
    }
}
