<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'AdminController@index')->name('index');
Route::get('/demomail', 'AdminController@demomail')->name('demomail');
Route::get('/settings', 'AdminController@settings')->name('settings');
Route::get('/profile', 'AdminController@profile')->name('profile');
Route::post('/profile', 'AdminController@saveprofile')->name('saveprofile');
Route::post('/updatepassword', 'AdminController@updatePassword')->name('updatePassword');
Route::post('/settings', 'AdminController@saveSettings')->name('savesettings');
Route::resource('teacher','AdminResource\TeacherResource');
Route::post('/teacher/ajaxTeachers', 'AdminResource\TeacherResource@ajaxTeachers')->name('teacher.ajaxTeachers');
Route::resource('student','AdminResource\StudentResource');
Route::post('/student/ajaxStudent', 'AdminResource\StudentResource@ajaxStudent')->name('student.ajaxStudent');
Route::resource('mark','AdminResource\StudentMarkResource');
Route::resource('mark/sss','AdminResource\StudentMarkResource');
Route::post('/mark/ajaxMark', 'AdminResource\StudentMarkResource@ajaxMark')->name('student.ajaxMark');
