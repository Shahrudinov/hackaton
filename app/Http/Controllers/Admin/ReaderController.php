<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReaderController extends Controller
{


    public function index(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $readers = User::has('books')->where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $readers = User::has('books')->latest()->paginate($perPage);
        }

        return view('admin.reader.index', compact('readers'));
    }
}
