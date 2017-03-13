<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_en', 'name_es', 'slug'];

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($category) { // before delete() method call this
             $category->books()->delete();
             // do the rest of the cleanup...
        });
    }
}
