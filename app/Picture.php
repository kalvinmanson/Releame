<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['name', 'size'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
	public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
