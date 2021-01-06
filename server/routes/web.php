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
Route::get('/', 'TopController@index')->name('top.index');
// Route::get('/home', 'HomeController@index')->name('home');


// 検索,分類ごとのページ(表示）
Route::get('/search','SearchController@index')->name('menu.searchpage');
Route::get('/search','SearchController@index')->name('menu.jukushu');
Route::get('/search','SearchController@index')->name('menu.junshu');
Route::get('/search','SearchController@index')->name('menu.kunshu');
Route::get('/search','SearchController@index')->name('menu.soushu');


