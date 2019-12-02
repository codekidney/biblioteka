<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Isbn;
use App\Repositories\BookRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookRepository $bookRepo)
    {
        $booksList = $bookRepo->getAll();
        return view('books/list', ['booksList' => $booksList]);
    }
    
    public function cheapest(BookRepository $bookRepo)
    {
        $booksList = $bookRepo->cheapest();
        return view('books/list', compact('booksList'));
    } 
    
    public function longest(BookRepository $bookRepo) 
    {
        $booksList = $bookRepo->longest();
        return view('books/list', compact('booksList'));
    } 
    
    public function search(Request $request, BookRepository $bookRepo) {
        $q = $request->input('q');
        $booksList = $bookRepo->search($q);
//        $booksList = DB::table('books')->where('name','like',"%".$q."%")->orderBy('name','asc')->get();
//        $booksList = DB::table('books')->leftJoin('isbns', 'isbns.book_id', '=', 'books.id')->where('name','like',"%".$q."%")->select('books.*', 'isbns.*')->get();
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
