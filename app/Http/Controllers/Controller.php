<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// class HomeController extends Controller
// {
//    public function showWelcome() {
//   	return view('welcome');
//   }
// }

public function rollDice($guess) {
	$roll = mt_rand(1,6);
	if ($guess == $roll) {
		$message = "You got it!";
	} else {
		$message = "You lose!";
	}

 	$data = compact('message', 'random', 'roll');
    return view('roll-dice')->with($data);
}