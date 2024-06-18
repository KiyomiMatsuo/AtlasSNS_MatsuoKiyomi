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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

//投稿フォーム画面へ移動するリンクの実装
Route::post('/post/create','PostsController@postCreate');

//投稿を編集するためのルーティング
Route::get('/top/edit','PostsController@edit');
//ブラウザに表示されない、更新処理だけを行う用のルーティング
Route::post('/top/edit','PostsController@update');

//投稿の削除処理を行うためのルーティング
Route::get('/post/{id}/delete', 'PostsController@delete');
//ブラウザに表示されない、更新処理だけを行う用のルーティング
Route::post('/post/delete', 'PostsController@delete');

//検索ページへ移動するためのルーティング
Route::get('/search','UsersController@search');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

Route::get('/logout','Auth\LoginController@logout');

});
