<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   		public function showWelcome() {
   				return view('welcome');
   		}

	 // public function rollDice($guess) {
	 // 	$roll = mt_rand(1,6);
	 // 	if ($guess == $roll) {
	 // 		$message = "You got it!";
	 // 	} else {
	 // 		$message = "You lose!";
	 // 	}

	 //  	$data = compact('message', 'random', 'roll');
	 //     return view('roll-dice')->with($data);
	 // }

}

