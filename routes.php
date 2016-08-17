<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/sayHello/{name}', function($name){
	return "Hello, " . $name . "!";
});
Route::get('/uppercase/{word}', function($word) {
	if(!empty($word)) {
		return strtoupper($word);;
	}
	
});
Route::get('/increment/{number}', function($number) {
		if(is_numeric($number)) {
		return ++$number;
	}
});