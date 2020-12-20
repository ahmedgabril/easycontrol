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

//Route::get('/', function () {
   // return view('livewire.home');
//});


Auth::routes();
Route::livewire('/', 'home')->name('home');
Route::livewire('/grop', 'grop')->name('grop');// route for customer
Route::livewire('/prodect', 'allprodect')->name('pro');
Route::livewire('/createpro', 'createpro')->name('createpro');
Route::livewire('/premmanth', 'getpremmanth')->name('getpremmanth');
Route::livewire('/updatepro/{id}', 'updatepro')->name('updatepro');
Route::livewire('/manth', 'manth')->name('manth');
Route::livewire('/reposel', 'reposel')->name('reposel');
Route::livewire('/repoc', 'repoc')->name('repoc');
//Route::get('/home', 'HomeController@index')->name('home');

