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

Route::get('/', 'StaticController@index');
Route::get('about/', 'StaticController@about');
//Route::get('contact/', 'StaticController@contact');
//Route::get('send/', 'StaticController@send');


Route::get('archive/articles/{year}/{month}', 'ArchiveArticlesController@index');
Route::get('numerology_calc/', 'NumerologyCalculatorsController@index');
Route::post('numerology_calc/fate_spirit', 'NumerologyCalculatorsController@fate_spirit');
Route::post('numerology_calc/forecast', 'NumerologyCalculatorsController@forecast');



Route::resource('articles', 'ArticlesController');
Route::resource('contacts', 'ContactsController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// php artisan route:list //
