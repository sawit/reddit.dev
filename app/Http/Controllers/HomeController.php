<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function uppercase($word = "caps") {
        return view('uppercase')->with('word', strtoupper($word));

    }
    public function increment($number = 0) {
        $number += 1;
        return view('increment')->with('number', $number);
    }
    public function showWelcome($name = 'Emily') {
        return view('welcome')->with('name', $name);

        // redirect()->action('HomeController@uppercase', array('Emily'));
    }
}
