<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pages = Page::orderBy('updated_at', 'desc')->paginate(20);
        return view('pages/index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'slug' => ['unique:pages', 'required', 'max:50']
        ]);
        $record_store = request()->all();
        Page::create($record_store);
        return redirect()->action('PageController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        dd($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        $categories = Category::all();
        return view('pages/edit', compact('page', 'categories'));
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
        $page = Page::find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'slug' => ['unique:pages,slug,'.$page->id, 'required', 'max:50']

        ]);
        $record_store = request()->all();
        $page->fill($record_store)->save();
        return redirect()->action('PageController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        Page::destroy($page->id);
        return redirect()->action('PageController@index');
    }
}
