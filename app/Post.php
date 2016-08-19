<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
	use SoftDeletes;
    // protected $table = 'posts';
    public static $rules = [
            'title' => 'required|max:100',
            'url' => 'required|url',
            'content' => 'required'
    ];
}
