<?php

namespace App\Http\Controllers;


use App\Menu;
use App\Link;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public function __construct() {

    	$menu = Link::where('country', 'all')->orWhere('country', $this::country())->orderBy('orden', 'asc')->get();

        view()->share('site_menus', $menu);
    	view()->share('country', $this::country());
    }
    public function country() {
    	$domain = request()->server->get('SERVER_NAME');
    	if($domain == "domain.country") {
    		return "ec";
    	} else {
    		return "co";
    	}
    }


}
