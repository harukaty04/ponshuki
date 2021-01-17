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

# ユーザー新規登録、ログイン、ログアウト
Auth::routes();
# ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');



# ユーザー投稿関係(index, show)
Route::get('review/{review}', 'ReviewsController@show')->name('review.show')->where('article', '[0-9]+'); 
Route::get('/','ReviewsController@index')->name('top.index');
Route::post('/create','ReviewsController@create')->name('top.create');

// 検索,分類ごとのページ(表示）
Route::get('/search','SearchController@index')->name('users.searchpage');
Route::get('/likes','LikesController@index')->name('users.likes');
Route::get('/profile','UserController@show')->name('users.profile');
Route::get('/edit_profile','UserController@edit')->name('users.edit_profile');

//ユーザー表示処理
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{id}', 'UserController@show')->name('profile');
});

//sakeAPI
Route::get(' https://muro.sakenowa.com/sakenowa-data/api/brands');
