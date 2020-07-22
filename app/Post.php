<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $fillable = ['title', 'body', 'image', 'published', 'author', 'created_at', 'slug'];


}


