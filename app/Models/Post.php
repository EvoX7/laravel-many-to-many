<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // protected $fillable = [
    //     'user_id',
    //     'title',
    //     'category',
    //     'post_url',
    //     'post_content',
    //     'post_date'
    // ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}



