<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/sayHello/{name}', function($name){
// 	return "Hello, " . $name . "!";
// });
//  Route::get('/uppercase/{word}', function($word) {
//  	$data =strtoupper($word);
//  	return view('uppercase', $data);
	
// });
Route::get('/', 'HomeController@showWelcome');
Route::get('/uppercase/{word}', 'HomeController@uppercase');
Route::get('/increment/{number}', 'HomeController@increment');

// Route::get('/increment/{number}', function($number) {
// 		if(is_numeric($number)) {
// 			return ++$number;
// 	}
// });
// Route::get('/sum/{digit}/{number}', function($digit, $number)
//  {
//      return $digit + $number;
//  });
// Route::get('/sayhello/{name}', function($name)
// {
//     if ($name == "Chris") {
//         return Redirect::to('/');
//     }
    
//     $data = [
//     'firstName' => $foo,
//     'lastName' => $name,
//     ];

//     $data = array('name' => $name);
//     return view('my-first-view', $data);
//     return view('my-first-view')->with('firstName', $foo);
//     return view('my-first-view')=>with($data);
// });
// Route::get('/rolldice/{guess}', 'HomeController@rollDice');
// Route::get('/rolldice/{guess}', function($guess) {
//     $data = ['roll' => rand(1, 6), 'guess' => $guess];
//     return view('roll-dice', $data);

//  });