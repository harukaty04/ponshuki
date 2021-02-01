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
//画像投稿でも使用
Route::resource('review', 'ReviewsController', ['only' => ['create', 'store', 'destroy']]);
Route::post('/create','ReviewsController@create')->name('top.create');
Route::get('/review/edit/{review_id}', 'ReviewsController@edit')->name('review.edit');
Route::post('/review/edit', 'ReviewsController@update')->name('review.update');
Route::post('/review/destroy','ReviewsController@destroy')->name('review.destroy');

# 編集機能作成

// 検索,分類ごとのページ(表示）
Route::get('/search','SearchController@index')->name('user.searchpage');
Route::get('/likes','LikesController@index')->name('user.likes');
Route::get('/profile/{id}','UserController@show')->name('user.profile');
Route::get('/edit_profile','UserController@edit')->name('user.edit_profile');

//ユーザー表示処理
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{id}', 'UserController@show')->name('profile');
});

//sakeAPI
Route::get(' https://muro.sakenowa.com/sakenowa-data/api/brands');
Route::get('/search/sake', 'SearchController@getSake');
Route::get('/search/sake', 'ReviewsController@getSake');

//いいね
Route::post('/likes', 'ReviewsController@like')->name('reviews.like');
Route::get('/{name}/likes', 'UserController@likes')->name('likes');




