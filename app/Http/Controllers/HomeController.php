<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function uppercase($word = "caps") {
        return view('uppercase')->with('word', strtoupper($word));

    }
    public function increment($number = 0) {
        $number += 1;
        return view('increment')->with('number', $number);
    }
    public function showWelcome() {
      $posts = Post::with('user')->orderBy('created_by', 'desc')->take(10)->get();
      return view('welcome')->with('posts', $posts);
    }

}
