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

//ログインユーザーのプロフィール編集画面に移動するためのルーティング
Route::get('/profile','UsersController@profile');
//プロフィールの更新処理
Route::post('/profile/update','UsersController@update');
//プロフィールの編集処理にバリデーション処理を実装する
Route::post('/profile','UsersController@profileValidates');

//他ユーザーのプロフィールに移動するためのルーティング
Route::get('/users/{id}/profile','UsersController@OtherProFile');

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

//フォローリスト、フォロワーリストのページへ移動するためのルーティング
Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

//フォローする、解除のルーティング
Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

//ログアウトするためのルーティング
Route::get('/logout','Auth\LoginController@logout');

});
