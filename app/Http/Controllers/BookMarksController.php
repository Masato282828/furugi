<?php

namespace App\Http\Controllers;
use App\BookMark;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookMarksController extends Controller
{
    public function store(Request $request)
    {
        $bookmark = new BookMark;
        $bookmark->book_id = $request->book_id;
        $bookmark->user_id = Auth::user()->id;
        $bookmark->save();
        
        return redirect()->route('book.show',[$request->book_id]);
    }
    
    public function destroy(Request $request, $id) {
        $book=Book::findOrFail($id)
        
        $book->bookmarks()->delete();
        
        return redirect()->route('book.show',[$request->book_id]);
    }
}
