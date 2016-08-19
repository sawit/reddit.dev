<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
// use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    protected $table = 'posts';
    // use SoftDeletes;
}
