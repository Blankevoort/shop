<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchasedBook;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $items = PurchasedBook::where('user_id', Auth::id())
            ->with('book')
            ->get();

        return view('library', [
            'items' => $items
        ]);
    }
}
