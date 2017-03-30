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
        
        // subir imagen
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getFilename().'.'.$extension;
            //redimencionar imagem
            $img = Image::make($request->file('picture')->getRealPath());
            $img->widen(900);
            Storage::disk('local')->put($filename,  $img->stream());
        } else {
            $this->validate(request(), [
                'name' => ['required', 'min:10']
            ]);
        }
        $record_store = request()->all();
        if(isset($filename) && !empty($filename)) {
            $record_store['picture'] = $filename;
        }
        $record_store['user_id'] = $current_user->id;
        //dd($record_store);
        $book = Book::create($record_store);
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
