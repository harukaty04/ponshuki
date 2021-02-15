<?php

// ユーザー新規登録、ログイン、ログアウト
Auth::routes();
// ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');
// トップページ一覧表示
Route::get('/','ReviewController@index')->name('review.index');

// レビューのCRUD機能関係
Route::prefix('review')->name('review.')->group(function () {
    Route::get('/edit/{review_id}', 'ReviewController@edit')->name('edit');
    Route::get('/{review}', 'ReviewController@show')->name('show');
    Route::post('/edit', 'ReviewController@update')->name('update');
    Route::post('/destroy','ReviewController@destroy')->name('destroy');
    Route::post('/create','ReviewController@create')->name('create');
});

//編集機能作成
Route::post('/edit_profile', 'UserController@updateProfile')->name('user.update');

// 検索,分類ごとのページ(表示）
Route::get('/search','SearchController@index')->name('user.search');
Route::get('/likes','LikesController@index')->name('user.likes');

//ユーザー表示処理
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/','UserController@show')->name('profile');
    Route::get('/edit_profile','UserController@edit')->name('edit_profile');
});

//sakeAPI
Route::get('https://muro.sakenowa.com/sakenowa-data/api/brands');
Route::get('/search/sake', 'SearchController@getSake');
Route::get('/search/sake', 'ReviewController@getSake');

//いいね機能
Route::get('/likes/{name}', 'LikesController@likes')->name('likes'); // '/likes/{name}' likesControllerに移動させるべき
Route::prefix('likes')->name('likes.')->group(function () {
    Route::post('/', 'LikesController@create')->name('create');
});







# ゲストユーザーログイン
// Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

# ユーザー投稿関係(index, show)
// Route::get('review/{review}', 'ReviewController@show')->name('review.show')->where('article', '[0-9]+'); 
// Route::get('/','ReviewController@index')->name('review.index');

//画像投稿でも使用
//resourceの部分をすべて名前つきルートにする、bladeのルートも直接指定の部分を名前付きルートに変更
//ルートのグループ化
// Route::resource('review', 'ReviewController', ['only' => ['create', 'store', 'destroy']]);
// Route::post('/create','ReviewController@create')->name('review.create');
// Route::get('/review/edit/{review_id}', 'ReviewController@edit')->name('review.edit');
// Route::post('/review/edit', 'ReviewController@update')->name('review.update');
// Route::post('/review/destroy','ReviewController@destroy')->name('review.destroy');

//いいね
// Route::post('/likes', 'ReviewController@like')->name('review.like');
// Route::post('/likes', 'LikesController@create')->name('likes.create');

//{id}を止める
// Route::get('/user','UserController@show')->name('user.profile');
// Route::get('/edit_profile','UserController@edit')->name('user.edit_profile');
