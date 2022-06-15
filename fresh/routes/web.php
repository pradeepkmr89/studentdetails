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

 
 Route::get('/clearall', function() {
     $exitCode = Artisan::call('optimize:clear');
     return 'clear cache cleared';
 });
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/testmail', [App\Http\Controllers\HomeController::class, 'testmail']);


/*Newslater*/
 Route::get('/newsletter', [App\Http\Controllers\HomeController::class, 'newsletter'])->name('home.newsletter');

 Route::get('/changeStatus', [App\Http\Controllers\User\UserController::class, 'changeStatus'])->name('changeStatus');

/*****//*******
User Panel
******//*******/
Route::prefix('user')->group(function() {
    Route::group(['middleware' => ['auth']],function() {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'user_dashboard'])->name('user.dashboard');
    Route::get('/profile', [App\Http\Controllers\User\UserController::class, 'user_profile'])->name('user.profile');
    Route::post('/profile', [App\Http\Controllers\User\UserController::class, 'update_profile'])->name('user.profile');
  
   Route::get('/upload/artwork', [App\Http\Controllers\Vendor\VendorController::class, 'upload_artwork'])->name('upload.artwork');
    Route::post('/upload/artwork', [App\Http\Controllers\Vendor\VendorController::class, 'save_artwork'])->name('upload.artwork'); 
//ARTWORK
    Route::get('/list/artwork', [App\Http\Controllers\Vendor\VendorController::class, 'list_artwork'])->name('list.artwork');
    Route::get('/artwork/edit/{id}', [App\Http\Controllers\Vendor\VendorController::class, 'edit_artwork'])->name('edit.artwork');
    Route::post('/artwork/update', [App\Http\Controllers\Vendor\VendorController::class,'update_artwork'])->name('artwork.update');
    Route::get('/artwork/delete/{id}', [App\Http\Controllers\Vendor\VendorController::class,'artwork_delete'])->name('user.artwork.delete');

   

    });
});

 


/*Admin*/

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    
    Route::get('/user/list', 'Admin\AdminController@user_list')->name('admin.user.list');
    
    Route::get('/cms', 'Admin\AdminController@cms')->name('admin.user.cms');

/*Products*/
    Route::get('/product/list', 'Admin\ProductController@index')->name('admin.product.list');
    Route::get('/product/create', 'Admin\ProductController@create')->name('admin.product.create');
    Route::get('/product/edit/{id}', 'Admin\ProductController@edit')->name('admin.product.edit');
    Route::post('/product/save', 'Admin\ProductController@save')->name('admin.product.save');
    Route::post('/product/update', 'Admin\ProductController@update')->name('admin.product.update');
    Route::get('/product/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');

//*Testimonal*/

 Route::get('/testimonial/list', 'Admin\TestimonialController@index')->name('admin.testimonial.list');
Route::get('/testimonial/create', 'Admin\TestimonialController@create')->name('admin.testimonial.create');
Route::get('/testimonial/edit/{id}', 'Admin\TestimonialController@edit')->name('admin.testimonial.edit');
Route::post('/testimonial/save', 'Admin\TestimonialController@save')->name('admin.testimonial.save');
Route::post('/testimonial/update', 'Admin\TestimonialController@update')->name('admin.testimonial.update');
Route::get('/testimonial/delete/{id}', 'Admin\TestimonialController@delete')->name('admin.testimonial.delete');


//*Gallery*/

 Route::get('/gallery/list', 'Admin\GallaryController@index')->name('admin.gallery.list');
Route::get('/gallery/create', 'Admin\GallaryController@create')->name('admin.gallery.create');
Route::get('/gallery/edit/{id}', 'Admin\GallaryController@edit')->name('admin.gallery.edit');
Route::post('/gallery/save', 'Admin\GallaryController@save')->name('admin.gallery.save');
Route::post('/gallery/update', 'Admin\GallaryController@update')->name('admin.gallery.update');
Route::get('/gallery/delete/{id}', 'Admin\GallaryController@delete')->name('admin.gallery.delete');

/*list Newslater*/
Route::get('/newsletter/list', 'Admin\AdminController@newsletter_list')->name('admin.newsletter.list');





    /* OLD */
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