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
Route::get('/search-course', 'CourseController@searchCourse')->name('course.search');
Route::group(['middleware' => 'auth.user'], function () { 
    Route::get('/{course}/course-detail', 'CourseController@showCourseDetail')->name('course.detail');
    Route::get('/{course}/search-lesson', 'CourseController@searchCourseDetail')->name('course-detail.search');
    Route::post('/user-course', 'HomeController@createUserCourse')->name('user.courses');
    Route::delete('/{course}/course', 'CourseController@destroyUserCourse')->name('course-user.destroy');
    Route::get('/{course}/{lesson}/lesson', 'LessonController@showLesson')->name('lesson');
    Route::post('/{lesson}', 'ReviewController@storeReview')->name('review.store');
    Route::put('/{review}/update-review', 'ReviewController@updateLessonReview')->name('lesson-review.update');
    Route::delete('/{review}/review', 'ReviewController@destroyLessonReview')->name('lesson-review.destroy');
    Route::post('/{course}/review', 'ReviewController@storeCourseReview')->name('course-review.store');
    Route::get('/profile', 'HomeController@showProfile')->name('profile');
    Route::put('/profile', 'HomeController@editProfile')->name('profile.update');
    Route::put('/update-avatar', 'HomeController@updateAvatar')->name('avatar.update');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.admin'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('index');
    Route::resource('users', 'Admin\UserController');
    Route::get('/search-user', 'Admin\UserController@searchUser')->name('user.search');
    Route::resource('courses', 'Admin\CourseController');
    Route::get('/search-course', 'Admin\CourseController@searchCourse')->name('course.search');
    Route::resource('tags', 'Admin\TagController');
    Route::get('/search-tag', 'Admin\TagController@searchTag')->name('tag.search');
    Route::get('/list', 'Admin\LessonController@showListCourse')->name('list.index');

    Route::group(['prefix' => 'lesson', 'as' => 'lesson.'], function () {
        Route::get('/{course}/index', 'Admin\LessonController@index')->name('index');
        Route::get('/{course}/search-lesson', 'Admin\LessonController@searchLesson')->name('search');
        Route::get('/{course}/create', 'Admin\LessonController@create')->name('create');
        Route::post('/{course}', 'Admin\LessonController@store')->name('store');
        Route::get('/{course}/{lesson}/edit', 'Admin\LessonController@edit')->name('edit');
        Route::put('/{course}/{lesson}', 'Admin\LessonController@update')->name('update');
        Route::delete('/{course}/{lesson}', 'Admin\LessonController@destroy')->name('destroy');
    });
});
