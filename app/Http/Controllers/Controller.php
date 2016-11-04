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

        $global_links = Link::where('parent_id', 0)
        ->where(function($query){
            $query->where('country', 'all');
            $query->orWhere('country', $this::country());
        })
        ->orderBy('orden', 'asc')->get();


        view()->share('country', $this::country());
        view()->share('global_links', $global_links);
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
