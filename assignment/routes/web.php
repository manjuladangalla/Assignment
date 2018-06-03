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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/filter', 'HomeController@filter')->name('filter');

Route::get('/classes', 'ClassController@index')->name('classes');

Route::get('/parents', 'ParentController@index')->name('parents');


Route::get('/student', 'StudentController@index')->name('student_add');
Route::get('/student/{studentId}', 'StudentController@view')->name('student_view');
Route::get('/student/edit/{studentId}', 'StudentController@edit')->name('student_edit');
Route::post('/student', 'StudentController@save')->name('student_save');
Route::post('/student/update/{studentId}', 'StudentController@update')->name('student_update');
Route::get('/student/delete/{studentId}', 'StudentController@delete')->name('student_delete');

Route::get('/class', 'ClassController@add')->name('class_add');
Route::post('/class', 'ClassController@save')->name('class_save');
Route::get('/class/{classId}', 'ClassController@view')->name('class_view');
Route::get('/class/edit/{classId}', 'ClassController@edit')->name('class_edit');
Route::post('/class/update/{classId}', 'ClassController@update')->name('class_update');
Route::get('/class/delete/{classId}', 'ClassController@delete')->name('class_delete');


Route::get('/parent', 'ParentController@add')->name('parent_add');
Route::post('/parent', 'ParentController@save')->name('parent_save');
Route::get('/parent/{parentId}', 'ParentController@view')->name('parent_view');
Route::get('/parent/edit/{parentId}', 'ParentController@edit')->name('parent_edit');
Route::post('/parent/update/{parentId}', 'ParentController@update')->name('parent_update');
Route::get('/parent/delete/{parentId}', 'ParentController@delete')->name('parent_delete');

Route::get('/student_parent/{studentId?}/{parentId?}','StudentParentController@index')->name('student_parent_add');
Route::post('/student_parent','StudentParentController@save')->name('student_parent_save');

