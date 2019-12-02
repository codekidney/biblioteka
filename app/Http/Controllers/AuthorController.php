<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $authorsList = Author::all();
        // Eager loading
        $authorsList = Author::with('books')->get();
        return view('authors/list', compact('authorsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = new Author();
        $author->lastname  = 'Adam';
        $author->firstname = 'Mickiewicz';
        $author->birthday  = '1910-10-02';
        $author->genres    = 'poezja, dramat';
        $author->save();
        
        $author2 = new Author();
        $author2->lastname  = 'Michał';
        $author2->firstname = 'Więckiewicz';
        $author2->birthday  = '1905-04-22';
        $author2->genres    = 'komedia, dramat';
        $author2->save();
        
        $book = Book::where('name', 'Pan Tadeusz')->first();
        $book->authors()->attach($author);
        $book->authors()->attach($author2);
        
        return redirect('books');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
