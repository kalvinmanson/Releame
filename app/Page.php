<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'content', 'country'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
