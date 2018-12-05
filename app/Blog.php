<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'image_path'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function path()
    {
    	return "/blogs/{$this->id}";
    }
}
