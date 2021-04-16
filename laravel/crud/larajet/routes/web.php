<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ejemplo 1:  return text
Route::get('/text', function () {
    return '<h1>Esto es un texto de prueba</h1>';
});

# Example 2: return a array
Route::get('/array', function () {
    $arreglo = ['Sunday', 'Monday', 'Thursday' . 'Wednesday'];
    return $arreglo;
});

# Example 3: return a associative array
Route::get('/associative-array', function () {
    $array = [
        'Id' => '1',
        'Description' => 'Coca cola'
    ];
    return $array;
});

# Example 4: params
Route::get('/name/{name}', function ($name) {
    return '<h1>The name is:  ' . $name . ' </h1>';
});

# Example 5: default params
Route::get('/clients/{client?}', function ($client='Cliente general') {
    return '<h1>The client is:  ' . $client . ' </h1>';
});

# Example 6: Routes
Route::get('/route1', function () {
    return '<h1>This is the route\'s one view</h1>';
})->name('routeNo1');

Route::get('/route2', function () {
    return redirect()->route('routeNo1');
});

# Example 7: Validations
Route::get('/users/{userId}', function ($user) {
    return 'The userId is: '.$user;
})->where('userId', '[0-9]+');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
