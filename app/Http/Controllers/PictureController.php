<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use File;
use Illuminate\Http\Request;
use App\Picture;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PictureController extends Controller
{

    public function manager() {

        $pictures = Picture::orderBy('updated_at', 'desc')->get();
        $pictures_output = [];
        foreach($pictures as &$picture) {
            array_push($pictures_output, ['url' => '/images/'.$picture->file_name, 'thumb' => '/images/'.$picture->file_name, 'id' => $picture->id]);
        }
        return response()->json($pictures_output);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pictures = Picture::orderBy('updated_at', 'desc')->paginate(40);
        return view('pictures/index', compact('pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pictures/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'name'      => 'required',
            'picture'   => 'mimes:jpeg,bmp,png'
        ]);
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {

            $filename = rand(100,999).'-'.$request->file('picture')->getClientOriginalName();
            //save file
            Storage::disk('local')->put($filename, File::get($request->file('picture')));


            $request->merge([ 'user_id' => Auth::user()->id ]);
            $request->merge([ 'file_name' => $filename ]);

            //save record
            $picture = request()->all();
            Picture::create($picture);

            //response
            if(isset($request->froala)) {
                return response()->json([
                    'link' => '/images/'.$filename
                ]);
            } else {
                return redirect()->action('PictureController@index');
            }
        }
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
    public function destroy(Request $request, $id)
    {
        $picture = Picture::find($id);
        Picture::destroy($picture->id);
        Storage::disk('local')->delete($picture->file_name);
        return response()->json($picture->file_name);
    }
}
