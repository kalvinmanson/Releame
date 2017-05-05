<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use File;
use Image;

use Illuminate\Http\Request;
use App\Book;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    function __construct() {
        $this->middleware('auth', array('only' => array('create', 'store')));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($request->q)) {
            $books = Book::where('name', 'LIKE', '%'.$request->q.'%')->orWhere('content', 'LIKE', '%'.$request->q.'%')->orderBy('created_at', 'desc')->paginate(30);
        } else {
            $books = Book::orderBy('created_at', 'desc')->paginate(30);
        }
        return view('books/index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user = Auth::user();
        
        $this->validate(request(), [
            'file_picture' => 'required | mimes:jpeg,jpg,png | max:1000',
            'name' => ['required', 'min:5', 'max:100'],
            'author' => ['required', 'min:5', 'max:50'],
            'publisher' => ['required', 'min:5', 'max:50'],
            'lang' => ['required', 'min:2', 'max:2'],
            'tags' => ['required', 'min:5', 'max:50'],
            'abstract' => ['required', 'min:50'],
            'description' => ['required', 'min:20'],
            'price' => ['required', 'integer', 'min:1', 'max:50'],
        ]);
        // subir imagen            
        $file = $request->file('file_picture');
        $extension = $file->getClientOriginalExtension();
        $filename = $file->getFilename().'.'.$extension;
        //redimencionar imagem
        $img = Image::make($request->file('file_picture')->getRealPath());
        $img->widen(900);
        Storage::disk('local')->put($filename,  $img->stream());
        // end subir imagen 
        $record_store = request()->all();
        $record_store['picture'] = $filename;
        $record_store['user_id'] = $current_user->id;
        //dd($record_store);
        $book = new Book($record_store);
        $book->save();
        flash('Tu libro a sido publicado', 'success');
        return redirect()->action('BookController@index');
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
