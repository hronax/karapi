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

Route::get('/', function () {
    return view('welcome');
});

Route::get('resizeImage', 'ImageController@resizeImage');
Route::post('resizeImagePost',['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);

Route::get('news/{type}', 'NewsController@index');
Route::get('gifts', 'GiftsController@index');
Route::get('courses', 'CoursesController@index');
Route::get('groups', 'GroupsController@index');
Route::get('teachers', 'TeachersController@index');
Route::get('exams/{group_id}', 'ExamsController@index');
Route::get('schedule/{group_id}', 'ScheduleController@index');
Route::get('schedule/by_teacher/{teacher_id}', 'ScheduleController@by_teacher');

Route::get('admin', 'Admin\\DashboardController@index');
Route::resource('admin/news', 'Admin\\NewsController');
Route::resource('admin/auditories', 'Admin\\AuditoriesController');
Route::resource('admin/categories', 'Admin\\CategoriesController');
Route::resource('admin/buildings', 'Admin\\BuildingsController');
Route::resource('admin/subjects', 'Admin\\SubjectsController');
Route::resource('admin/teachers', 'Admin\\TeachersController');
Route::resource('admin/departments', 'Admin\\DepartmentsController');
Route::resource('admin/specializations', 'Admin\\SpecializationsController');
Route::resource('admin/news', 'Admin\\NewsController');
Route::resource('admin/gifts', 'Admin\\GiftsController');
Route::resource('admin/courses', 'Admin\\CoursesController');
Route::resource('admin/pairs', 'Admin\\PairsController');
Route::resource('admin/groups', 'Admin\\GroupsController');