<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Book::class);

        $data['books'] = Book::with('author')->get();

        return view('user.books.index')->with(['data' => $data]);
    }

    public function show(Book $book, $id)
    {
        $this->authorize('view', $book);

        $data['book'] = Book::with(['author', 'publisher'])->where('books.id', '=', $id)->get();

        return view('user.books.show')->with(['data' => $data]);
    }
}
