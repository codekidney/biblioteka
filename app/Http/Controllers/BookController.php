<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Isbn;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booksList = Book::all();
        return view('books/list', ['booksList' => $booksList]);
    }
    
    public function cheapest() {
        $booksList = DB::table('books')->orderBy('price','asc')->limit(3)->get();
        return view('books/list', compact('booksList'));
    } 
    
    public function longest() {
        $booksList = DB::table('books')->orderBy('pages','desc')->limit(3)->get();
        return view('books/list', compact('booksList'));
    } 
    
    public function search(Request $request) {
        $q = $request->input('q');
        $booksList = DB::table('books')->where('name','like',"%".$q."%")->orderBy('name','asc')->get();
        return view('books/list', compact('booksList'));
    } 
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $book = new Book();
        $book->name              = 'Pan Tadeusz';
        $book->year              = '2015';
        $book->pages             = '123';
        $book->price             = '12.99';
        $book->publication_place = 'Kielce';
        $book->save();
        
        $isbn = new Isbn(['number'=>'783135451315', 'issued_by'=>'Wydawnictwo Znak', 'issued_on'=>'2015-05-12']);
        $book->isbn()->save($isbn);
        
        return redirect()->back();
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
        $book = Book::find($id);
        return view('books/show',compact('book'));
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
        $book = Book::find($id);
        $book->delete();
        return redirect()->back();
    }
}
