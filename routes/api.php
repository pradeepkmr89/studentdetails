<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('content','Api\DetailsApiController@content');
Route::post('uploadimage','Api\UserApiController@uploadimage');
Route::post('checkfieldexist','Api\DetailsApiController@checkfieldexist');
Route::get('get/plan','Api\DetailsApiController@get_plan');
Route::get('get/forum/category','Api\DetailsApiController@get_forum_category');
 Route::get('get/profile','Api\UserApiController@get_profile');
 

Route::group([ 'prefix' => 'auth'], function () {
    Route::post('login', 'Api\UserApiController@login');
    Route::post('signup', 'Api\UserApiController@signup'); 
     Route::post('update/profile','Api\UserApiController@update_profile');
     Route::post('add/education','Api\UserApiController@add_education');
    
   Route::group([ 'middleware' => 'auth:api' ], function() {
    //Route::get('logout', 'AuthController@logout');
   
    
    
    Route::post('reset/password','Api\UserApiController@reset_password');
    Route::post('change/password','Api\UserApiController@change_password');
   
    
    //DetailsApiController
    Route::post('report/user','Api\DetailsApiController@report_user');
    Route::post('filter/setting','Api\DetailsApiController@filter_setting');
    Route::post('uploadimage','Api\UserApiController@uploadimage');
    Route::post('subscription','Api\DetailsApiController@subscription');
    //Forum post
    Route::get('forum/post','Api\ForumPostApiController@form_post');
    Route::post('forum/post/like','Api\ForumPostApiController@form_post_like');
    Route::post('forum/post/save','Api\ForumPostApiController@form_post_save');
    Route::get('get/saved/forum/post','Api\ForumPostApiController@get_saved_form_post');
    Route::post('forum/post/comment','Api\ForumPostApiController@form_post_comment');
    Route::post('forum/post/comment/reply','Api\ForumPostApiController@form_post_comment_reply');
    //Question
     Route::get('get/question','Api\QuestionApiController@get_question');
     Route::post('submit/answer','Api\QuestionApiController@submit_answer');
     Route::post('match/compatibility','Api\QuestionApiController@match_compatibility');

       
    }); 
}); 

