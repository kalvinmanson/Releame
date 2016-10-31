<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $fillable = ['name'];

    public function links()
    {
        return $this->hasMany('App\Link');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($menu) { // before delete() method call this
             $menu->links()->delete();
             // do the rest of the cleanup...
        });
    }
}
