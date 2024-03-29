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
//    return view('index');
//});

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/text', 'HomeController@textanalysis')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pdf', 'HomeController@screenshotPdf')->name('pdf');
Route::get('/solr', 'HomeController@solr')->name('solr');
Route::get('/post', 'PostController@index')->name('solr');
Route::post('/pdf2', 'HomeController@generate')->name('generate');


Route::get('/notify', 'HomeController@notificationTest')->name('home');

Route::resource('/linkfinder', 'LinkFinderController');

//Route::group(['middleware' => 'dev'], function () {
    Route::get('users', 'UsersController@index')->name('users');
    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

    Route::get('/notifications', 'UsersController@notifications');

    Route::any('/image-up', 'ImageGalleryController@imageUpload');
    Route::any('/get-gellery', 'ImageGalleryController@viewUploads');

//});

Route::get('/base/{any}', function (){
   return view('product');
});

//Route::get('link-finder', 'LinkFinderController@index')->name('linkfinder');
//Route::post('link-finder','LinkFinderController@getCdxResults')->name('finder.getCdxResults');
