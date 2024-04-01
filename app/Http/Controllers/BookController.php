<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function show(Book $book)
    {
        abort_if($book->isPurchased() === false, 403);

        return view('books.single', [
            'book' => $book
        ]);

    }
}
