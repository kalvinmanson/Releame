<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content'];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
