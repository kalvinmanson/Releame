<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Auth;
use Storage;
use File;
use App\Category;
use App\Field;
use App\Page;
use App\Picture;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    //home
    public function index()
    {
        return view('web/index');
    }
    //Show category
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('web/category', compact('category'));
    }
    //Show Page
    public function page($category, $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('web/page', compact('page'));
    }
    // Send email
    public function contact(Request $request) {
        if($request->method() == "POST") {
            
            //enviar email
            $data = [];
            Mail::send('emails.welcome', $data, function ($message) {
                $message->from('dev@musculodigital.com', 'Dev Musculo Digital');

                $message->to('kalvinmanson@gmail.com')->cc('gustavo.barragan@musculocreativo.com.co');
            });

        } else {
            return view('web/contact');
        }
    }
}
