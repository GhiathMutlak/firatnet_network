<?php

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
    return view('subscribers.index');
});

Route::get('/subscribers/show_by_line', function () {

    $subscribers = App\Subscriber::all();
    $lines = App\Line::all();
    return view('subscribers.show_by_line')
        ->with('subscribers', $subscribers)
        ->with('lines', $lines);

})->name('by_line');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('lines', 'LineController' );

Route::resource('districts', 'DistrictController' );

Route::resource('broadcasters', 'BroadcasterController' );

Route::resource('subscribers', 'SubscriberController' );

//Route::get('/subscribers/show_by_line', 'SubscriberController@showByLine')->name('by_line');
