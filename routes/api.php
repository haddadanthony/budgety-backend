<?php

use GuzzleHttp\Middleware;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('/incomes', 'IncomeController@store');
    Route::delete('/incomes/{id}', 'IncomeController@destroy');
    Route::put('/incomes/{id}', 'IncomeController@update');
    Route::get('/incomes', 'IncomeController@index');
    Route::get('/incomes/{id}', 'IncomeController@show');

    Route::post('/expenses', 'ExpenseController@store');
    Route::delete('/expenses', 'ExpenseController@destroy');
    Route::get('/expenses', 'ExpenseController@index');
    Route::get('/expenses/{id}', 'ExpenseController@show');
    Route::put('/expenses/{id}', 'ExpenseController@update');

    Route::post('/savings', 'SavingController@store');
    Route::put('/savings/{id}', 'SavingController@update');
    Route::get('/savings', "SavingController@index");
    Route::get('/savings/{id}', "SavingController@show");
    Route::delete('/savings/{id}', "SavingController@destroy");
});
