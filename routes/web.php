<?php

use App\Http\Controllers\IncomeController;
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

use App\Saving;
use App\Income;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/incomes', 'IncomeController@index');
Route::get('/incomes/{id}', 'IncomeController@show');

Route::get('/savings', "SavingController@index");
Route::get('/savings/{id}', "SavingController@show")->middleware('cors');