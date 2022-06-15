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

Route::get('/', function () {
    return view('welcome');
});
 Route::get('/clearall', function() {
     $exitCode = Artisan::call('optimize:clear');
     return 'clear cache cleared';
 });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    
    Route::get('/user/list', 'Admin\AdminController@user_list')->name('admin.user.list');
    Route::get('/reported/user', 'Admin\AdminController@reported_user')->name('admin.user.reported');
    Route::get('/cms', 'Admin\AdminController@cms')->name('admin.user.cms');
    Route::post('/getcontent', 'Admin\AdminController@getcontent')->name('admin.user.getcontent');
    Route::post('/update/cms', 'Admin\AdminController@update_cms')->name('admin.user.update_cms');
    Route::post('/get/user/transaction', 'Admin\AdminController@user_transaction')->name('admin.user.transaction');
    Route::post('/saveforumcategory', 'Admin\AdminController@saveforumcategory')->name('admin.saveforumcategory');
    Route::get('/forumcategorydelete/{id}', 'Admin\AdminController@forumcategorydelete')->name('forum-category-delete');
    Route::get('/get/forum/category', 'Admin\AdminController@get_forumcategory')->name('admin.get_forumcategory');
    
    Route::get('/get/forum/post', 'Admin\AdminController@get_forum_post')->name('admin.get_forumpost');
    Route::get('/create/forum/post', 'Admin\AdminController@create_forum_post')->name('admin.create_forumpost');
    Route::get('/edit/forum/post/{id}', 'Admin\AdminController@edit_forum_post')->name('admin.edit_forumpost');
    Route::get('/delete/forum/post/{id}', 'Admin\AdminController@delete_forum_post')->name('admin.delete_forumpost');
    Route::post('/save/forum/post', 'Admin\AdminController@save_forum_post')->name('admin.save_forumpost');
    Route::post('/update/forum/post', 'Admin\AdminController@update_forum_post')->name('admin.update_forumpost');
    //Question
    Route::get('/add/question', 'Admin\AdminController@add_question')->name('admin.add_question');
    Route::get('/get/question', 'Admin\AdminController@get_question')->name('admin.get_question');
    Route::post('/import/question', 'Admin\AdminController@import_question')->name('import');
    Route::get('/get/import/question', 'Admin\AdminController@get_import_question')->name('getimport');
    
    Route::get('/edit/question/{id}', 'Admin\AdminController@edit_question')->name('admin.edit_question');
    Route::post('/get/question/category', 'Admin\AdminController@get_question_category')->name('admin.get_question_category');
    Route::post('/save/question', 'Admin\AdminController@save_question')->name('admin.save_question');
    Route::post('/update/question', 'Admin\AdminController@update_question')->name('admin.update_question');
    Route::get('/delete/question/{id}', 'Admin\AdminController@delete_question')->name('admin.delete-question');

    
   }) ;