<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','API\LoginController@login');
Route::get('/allpost','API\BlogController@allPost');
Route::get('/getpost/{id}','API\BlogController@getPost');


Route::group(['middleware'=>'auth:api'], function () {
    // Admin dashboard
    Route::get('/dashboard','API\CategoryController@subCategory')->name('subcategory.index');
    Route::post('/newpost','API\BlogController@newPost');
    Route::post('/create-evs','API\BlogController@evsPost');
    Route::post('/updatepost','API\BlogController@updatePost');
    Route::post('/upload-file','API\BlogController@uploadFile');
    Route::delete('/deletePost','API\BlogController@deletePost');
    
    
    Route::get('/all-evs-feed','API\EvsFeedController@getall');
    Route::delete('/delete-evs-feed','API\EvsFeedController@deletePost');
    Route::delete('/delete-cat/{id}','API\EvsFeedController@deleteCat');
    Route::post('/category','API\EvsFeedController@createCat');
    Route::get('/category','API\EvsFeedController@getCategory');
    
    
    Route::post('/logout','API\LoginController@logout');
});


// hVt7YoYmPlIcZALGEMsL6PyUrHQWSyRDsMN9VLEi
// HTcq9p1CYx4F1hH7nUpWmsBZrTOh4xp6jpcdsSND