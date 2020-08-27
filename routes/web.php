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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/courses', 'CourseController@index')->name('course');
Route::post('search-course', 'CourseController@searchCourse')->name('course.search');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::resource('users', 'UserAdminController');
    Route::resource('courses', 'CourseAdminController');
    Route::get('/list', 'LessonAdminController@showListCourse')->name('list.index');

    Route::group(['prefix' => 'lesson', 'as' => 'lesson.'], function () {
        Route::get('/{course}/index', 'LessonAdminController@index')->name('index');
        Route::get('/{course}/create', 'LessonAdminController@create')->name('create');
        Route::post('/{course}', 'LessonAdminController@store')->name('store');
        Route::get('/{course}/{lesson}/edit', 'LessonAdminController@edit')->name('edit');
        Route::put('/{course}/{lesson}', 'LessonAdminController@update')->name('update');
        Route::delete('/{course}/{lesson}', 'LessonAdminController@destroy')->name('destroy');
    });
});
