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

Route::group(['middleware' => 'auth.user'], function () {
    Route::post('search-course', 'CourseController@searchCourse')->name('course.search');
    Route::get('/{course}/course-detail', 'CourseController@showCourseDetail')->name('course.detail');
    Route::post('/{course}/search-course', 'CourseController@searchCourseDetail')->name('course-detail.search');
    Route::post('/user-course', 'HomeController@createUserCourse')->name('user.courses');
    Route::get('/profile', 'HomeController@showProfile')->name('profile');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.admin'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('index');
    Route::resource('users', 'Admin\UserController');
    Route::resource('courses', 'Admin\CourseController');
    Route::resource('tags', 'Admin\TagController');
    Route::get('/list', 'Admin\LessonController@showListCourse')->name('list.index');

    Route::group(['prefix' => 'lesson', 'as' => 'lesson.'], function () {
        Route::get('/{course}/index', 'Admin\LessonController@index')->name('index');
        Route::get('/{course}/create', 'Admin\LessonController@create')->name('create');
        Route::post('/{course}', 'Admin\LessonController@store')->name('store');
        Route::get('/{course}/{lesson}/edit', 'Admin\LessonController@edit')->name('edit');
        Route::put('/{course}/{lesson}', 'Admin\LessonController@update')->name('update');
        Route::delete('/{course}/{lesson}', 'Admin\LessonController@destroy')->name('destroy');
    });
});
