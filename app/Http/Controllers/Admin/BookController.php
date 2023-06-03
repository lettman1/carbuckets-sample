<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        $this->authorize('create', Book::class);

        return view('admin.books.create');
    }

    public function destroy(Book $book, $id)
    {
        $this->authorize('delete', $book);

        $book->where('id', '=', $id)->delete();

        return redirect()->route('admin.books.index')->with('status', 'Book deleted');
    }

    public function edit(Book $book, $id)
    {
        $this->authorize('update', $book);
        
        $data['book'] = Book::with(['author', 'publisher'])->where('books.id', '=', $id)->get();
        $data['authors'] = Author::get();
        $data['publishers'] = Publisher::get();

        return view('admin.books.edit')->with(['data' => $data]);
    }

    public function index()
    {
        $data['books'] = Book::with('author')->get();

        return view('admin.books.index')->with(['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Book::class);

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'publisher' => 'nullable',
            'cover_photo' => 'nullable',
            'author' => 'required',
            'price' => 'required',
        ]);
        
        $author_id = Author::where("name", "=", $request->input('author'))->value('id');
        if(empty($author_id)) {
            $author_id = Author::create(["name" => $request->input('author')])->id;
        }

        $publisher_id = Publisher::where("name", "=", $request->input('publisher'))->value('id');
        if(empty($publisher_id)) {
            $publisher_id = Publisher::create(["name" => $request->input('publisher')])->id;
        }

        if(empty($author_id) || empty($publisher_id)) {
            return redirect()->route('admin.books.index')->with('error', 'Book add failed');
        }
        

        $book_info = [
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "cover_photo" => $request->input('cover_photo'),
            "publisher_id" => $publisher_id,
            "author_id" => $author_id,
            "price" => $request->input('price'),
        ];

        Book::create($book_info);

        return redirect()->route('admin.books.index')->with('status', 'Book added');
    }

    public function update(Request $request, Book $book, $id)
    {
        $this->authorize('update', $book);

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'publisher_id' => 'required',
            'cover_photo' => 'nullable',
            'author_id' => 'required',
            'price' => 'required',
        ]);

        $book->where('id', '=', $id)->update($request->only('title', 'description', 'cover_photo', 'publisher_id', 'author_id', 'price'));

        return redirect()->route('admin.books.index')->with('status', 'Book updated');
    }
}
