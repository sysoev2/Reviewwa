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

Route::get('/', 'MainPageController@index')->name('mainPage');
Route::get('/addReview', 'MainPageController@showReviewEditor');
Route::post('/uploader/img/upload', 'FileController@uploadImg');
Route::post('uploader/review/upload', 'ReviewController@createReview')->name('reviewUpload');
Route::get('/Reviews','MainPageController@getPage')->name('getPage');

Auth::routes();

Route::name('admin.')->prefix('admin')->middleware('auth','role:super-admin|admin')->group(function () {

    Route::get('/',function (){
       return redirect(route('admin.main'));
    });

    Route::get('/main', 'AdminController@index')->name('main');
    Route::get('/users','AdminController@showUsers')->name('users');
    Route::get('/reviews', 'AdminController@showReviews')->name('reviews');
    Route::get('/addUser','AdminController@showAddUser')->name('addUser');
    Route::post('/addUser/add', 'AdminController@createUser')->name('add');
    Route::post('/ban/user', 'AdminController@banUser')->name('banUser');
    Route::get('/unban/user/{id}','AdminController@unbanUser')->name('unbanUser')->where('id','^[0-9]+$');
    Route::put('/update/user/{id}','AdminController@updateUser')->name('updateUser');
});
