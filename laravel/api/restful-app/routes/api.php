<?php

use App\Http\Controllers\PersonController;
use App\Models\Person;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/persons', function () {

//     request()->validate([
//         'name' => 'required',
//         'firstSurname'=> 'required',
//         'secondSurname'=> 'required',
//         'age'=> 'required',
//     ]);

//     return Person::create([
//         'name' => request('name'),
//         'firstSurname' => request('firstSurname'),
//         'secondSurname' => request('secondSurname'),
//         'age' => request('age')
//     ]);
// });

// Route::put('persons/{personId}', function (Person $person) {
//     $person1 = Person::find(1);

//     request()->validate([
//         'name' => 'required',
//         'firstSurname'=> 'required',
//         'secondSurname'=> 'required',
//         'age'=> 'required',
//     ]);
//         echo $person->name;
//     $person1->name = "Israel Huerta";
//     $person1->update();
// });

Route::resource('persons', PersonController::class);
