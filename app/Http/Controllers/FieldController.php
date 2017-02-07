<?php

namespace App\Http\Controllers;

use Auth;
use App\Field;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $fields = Field::groupBy('name')->get();;
        return response()->json($fields);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        //validation
        $this->validate($request, [
            'name'          =>  'required',
            'page_id'       =>  'required',
            'content'       =>  'required'
        ]);
        
        //save record
        $field = request()->all();
        Field::create($field);

        //response
        return redirect()->action('PageController@edit', $field['page_id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $field = Field::find($id);
        return view('fields/edit', compact('field'));
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
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }

        $field = Field::find($id);

        $this->validate(request(), [
            'name' => ['required', 'max:100']
        ]);
        $record_store = request()->all();
        $field->fill($record_store)->save();
        return redirect()->action('PageController@edit', $field['page_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Only Admins
        if(!$this->hasrole('Admin')) { return redirect('/'); }
        
        $field = Field::find($id);
        Field::destroy($field->id);
        return redirect()->action('PageController@edit', $field['page_id']);
    }
}
