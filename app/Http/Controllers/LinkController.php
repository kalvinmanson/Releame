<?php

namespace App\Http\Controllers;


use Auth;
use App\Link;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{


    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'name'          =>  'required',
            'menu_id'       =>  'required',
            'country'       =>  'required'
        ]);
        
        //save record
        $link = request()->all();
        Link::create($link);

        //response
        return redirect()->action('MenuController@edit', $link['menu_id']);
    }


    public function edit($id)
    {
        $link = Link::find($id);
        return view('links/edit', compact('link'));
    }


    public function update(Request $request, $id)
    {
        $link = Link::find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100']
        ]);
        $record_store = request()->all();
        $link->fill($record_store)->save();
        return redirect()->action('MenuController@edit', $link['menu_id']);
    }

    public function destroy($id)
    {
        $link = Link::find($id);
        Link::destroy($link->id);
        return redirect()->action('MenuController@edit', $link['menu_id']);
    }
}
