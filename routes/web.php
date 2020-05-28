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

Route::get('/', 'ImageController@index');
Route::post('/image', 'ImageController@store')->name('simple.add');
Route::post('/image_ajax', 'ImageController@ajaxstore')->name('ajaxupload.action');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/main_panel', function () {
    return view('tabs_panel.main_panel');
})->name('main_panel');

Route::post('/change_tab', 'TabsController@change_tab')->name('change_tab');
