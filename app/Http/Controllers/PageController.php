<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function duplicate(Request $request) {
        $page = Page::find($request->id);
        $newPage = $page->replicate();
        $newPage->slug = $newPage->slug .'-copy'; 
        $newPage->save();

        return redirect()->action('PageController@edit', $newPage->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        if(isset($request->q)) {
            $pages = Page::where('name', 'LIKE', '%'.$request->q.'%')->orWhere('content', 'LIKE', '%'.$request->q.'%')->orderBy('updated_at', 'desc')->paginate(100);
        } else {
            $pages = Page::orderBy('updated_at', 'desc')->paginate(50);
        }
        return view('pages/index', compact('pages'));
    }

    public function store(Request $request)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'slug' => ['unique:pages', 'required', 'max:50']
        ]);
        $record_store = request()->all();
        $page = Page::create($record_store);
        return redirect()->action('PageController@edit', $page->id);
    }

    public function edit($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $page = Page::find($id);
        $categories = Category::all();
        return view('pages/edit', compact('page', 'categories'));
    }
    public function update(Request $request, $id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $page = Page::find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100'],
            'slug' => ['unique:pages,slug,'.$page->id, 'required', 'max:50']
        ]);
        $record_store = request()->all();
        $page->fill($record_store)->save();
        return redirect()->action('PageController@index');
    }
    public function destroy($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        
        $page = Page::find($id);
        Page::destroy($page->id);
        return redirect()->action('PageController@index');
    }
}
