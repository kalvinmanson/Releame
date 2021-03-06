<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    protected $fillable = ['user_id', 'picture', 'name', 'slug', 'author', 'publisher', 'collection', 'pages', 'isbn10', 'isbn13', 'abstract', 'description', 'lang', 'condition', 'stock', 'price', 'tags', 'rank'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
	public function category()
    {
        return $this->belongsTo('App\Category');
    }    
    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
