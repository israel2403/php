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
    return "Hola desde la pagina de inicio";
});

Route::get('contacto', function () {
    return 'Hola desde la pagina de contacto';
});


# Route with parameters
Route::get('greet/{name?}', function ($name = "Visitante") {
    return "saludos " . $name;
});

# Add name to a route
Route::get('contacts-to-me', function () {
    return "Sección de contactos";
})->name('contacts');


Route::get('/index', function () {
    echo "<a href='" . route('contacts') . "'>contactos 1</a><br>";
    echo "<a href='" . route('contacts') . "'>contactos 2</a><br>";
    echo "<a href='" . route('contacts') . "'>contactos 3</a><br>";
    echo "<a href='" . route('contacts') . "'>contactos 4</a><br>";
    echo "<a href='" . route('contacts') . "'>contactos 5</a><br>";
});

# return html

Route::get('home', function () {
    $name = "Israel";
    return view('home')->with('name', $name);
})->name('home');


# return Route::view
# Variable portfolio
$portfolio = [
    ['title' => 'Portfolio 1'],
    ['title' => 'Portfolio 2'],
    ['title' => 'Portfolio 3'],
    ['title' => 'Portfolio 4'],
];
Route::view('/home', 'home')->name('root');
Route::view('/about', 'about')->name('about');
Route::view('/portfolio', 'portfolio', compact('portfolio'))->name('portfolio');
Route::view('/contact', 'contact')->name('contact');
