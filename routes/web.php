<?php
use App\Http\Middleware\MedicineMiddleware;
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

Route::get('/', 'MedicineController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' =>'auth'], function ()
{
    Route::get('/create', 'MedicineController@create')->name('create');
    Route::post('/create/store', 'MedicineController@store')->name('store');
    Route::get('/show/{id}', 'MedicineController@show')->name('show');
    Route::get('/edit/{id}', 'MedicineController@edit')->name('edit');
    Route::get('/destroy/{id}', 'MedicineController@destroy')->name('destroy');
    Route::patch('/edit/update/{id}', 'MedicineController@update')->name('update');
    Route::get('/calendar', 'MedicineController@getCalendar')->name('calendar');
});
