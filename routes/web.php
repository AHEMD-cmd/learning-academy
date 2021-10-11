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

Route::namespace('Front')->group(function(){

    //HomeController
    Route::get('/', 'HomeController@index')->name('front.homepage');

    //CourseController
    Route::get('/cat/{id}', 'CourseController@cat')->name('front.cat');
    Route::get('/cat/{c_id}/course/{id}', 'CourseController@show')->name('front.course');

    Route::get('/contact', 'ContactController@index')->name('front.contact');

    Route::post('/message/newsletter', 'MessageController@newsletter')->name('front.message.newsletter');
    Route::post('/message/contact', 'MessageController@contact')->name('front.message.contact');
    Route::post('/message/enroll', 'MessageController@enroll')->name('front.message.enroll');
});

Route::namespace('Admin')->prefix('dashboard')->group(function(){

    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::post('/dologin', 'AuthController@dologin')->name('admin.dologin');

    Route::middleware('adminAuth:admin')->group(function(){

        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/logout', 'AuthController@logout')->name('admin.logout');

        //cats
        Route::get('/cats', 'CatController@index')->name('cat.index');
        Route::get('/cats/create', 'CatController@create')->name('cat.create');
        Route::post('/cats/store', 'CatController@store')->name('cat.store');
        Route::get('/cats/edit/{id}', 'CatController@edit')->name('cat.edit');
        Route::post('/cats/update/{id}', 'CatController@update')->name('cat.update');
        Route::get('/cats/delete/{id}', 'CatController@delete')->name('cat.delete');
        // trainers
        Route::get('/tariners', 'TrainerController@index')->name('trainer.index');
        Route::get('/tariners/create', 'TrainerController@create')->name('trainer.create');
        Route::post('/tariners/store', 'TrainerController@store')->name('trainer.store');
        Route::get('/tariners/edit/{id}', 'TrainerController@edit')->name('trainer.edit');
        Route::post('/tariners/update/{id}', 'TrainerController@update')->name('trainer.update');
        Route::get('/tariners/delete/{id}', 'TrainerController@delete')->name('trainer.delete');
        // courses
        Route::get('/courses', 'CourseController@index')->name('course.index');
        Route::get('/courses/create', 'CourseController@create')->name('course.create');
        Route::post('/courses/store', 'CourseController@store')->name('course.store');
        Route::get('/courses/edit/{id}', 'CourseController@edit')->name('course.edit');
        Route::post('/courses/update/{id}', 'CourseController@update')->name('course.update');
        Route::get('/courses/delete/{id}', 'CourseController@delete')->name('course.delete');

    });


});

