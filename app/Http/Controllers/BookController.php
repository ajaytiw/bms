<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Psr\Http\Message\ResponseInterface;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function rateBook(Request $request, $bookId)
    {
           
        $oldUser = Rating::where('user_id', Auth::id())->where('book_id',$bookId)->first();

        if($oldUser)
        {
            $oldUser->rating = $request->rating;
            $oldUser->save();
            return redirect()->route('dashboard')->with('success','Rated Successfully');
        }else{
            $book = new Rating();
            $book->user_id = Auth::id();
            $book->book_id = $bookId;
            $book->rating = $request->rating;
            $book->save();
            return redirect()->route('dashboard')->with('success','Rated Successfully');
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // dd('show coment');
        // $book = Book::findorfail($book);
        // $book = $book::with('comments.user');

        // return view('frontend.dashboard',compact($book));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
