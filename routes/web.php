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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Роуты постов, контроллеры сгруппированы в папке Controllers->Post

Route::group(['namespace' => 'Post'], function () {
    Route::get('/posts', 'IndexController')->name('post.index');                        //name для main.blade.php
    Route::get('/posts/create', 'CreateController')->name('post.create');               //реализует только представление формы ввода данных для создания объекта
    Route::post('/posts', 'StoreController')->name('post.store');                       //реализует сохранение данных объекта в базу
    Route::get('/posts/{post}', 'ShowController')->name('post.show');                   //{post} отправляет в контроллер все что идет после http://127.0.0.1:8000/posts/
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');              //реализует только представление формы ввода данных для редактирования объекта
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');             //реализует обновление данных объекта в базе
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');           //реализует удаление данных объекта в базе
});



Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {               //prefix добавит везде после /значение admin
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/posts', 'IndexController')->name('admin.post.index');              //name для main.blade.php 
    });
});



Route::get('/employee', 'EmployeeController@index')->name('employee.index');
Route::get('/employee/create', 'EmployeeController@create');
Route::get('/employee/update', 'EmployeeController@update');
Route::get('/employee/delete', 'EmployeeController@delete');



Auth::routes();


