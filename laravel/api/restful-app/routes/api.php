<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['cors', 'json.response', 'auth:api'])->get('/user', function(Request $request){
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function(){
    //public routes
    Route::post('/login', 'App\Http\Controllers\Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register', 'App\Http\Controllers\Auth\ApiAuthController@register')->name('register.api');
    Route::post('/logout' , 'App\Http\Controllers\Auth\ApiAuthController@logout')->name('logout.api');
});


Route::middleware('auth:api')->group(function(){
    Route::get('/persons', 'App\Http\Controllers\PersonController@index')->middleware('api.admin')->name('persons');
});
