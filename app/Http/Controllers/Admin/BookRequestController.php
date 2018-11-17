<?php

namespace App\Http\Controllers\Admin;

use App\BookRequest;
use App\Services\RequestBookService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;


class BookRequestController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param int $id
     * @param RequestBookService $requestBookService
     */
    public function done(int $id, RequestBookService $requestBookService)
    {
        $requestBook = BookRequest::findOrFile($id);
        $requestBookService->done($requestBook);
        Alert::success('Done');
    }
}
