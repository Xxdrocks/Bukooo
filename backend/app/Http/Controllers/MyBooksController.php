<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyBooksController extends Controller
{
    public function myBooks()
    {
        $user = Auth::user();
        $books = $user->books; // pastikan relasi books() ada di model User

        return view('mybooks', compact('books'));
    }
}
