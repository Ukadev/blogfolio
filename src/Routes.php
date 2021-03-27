<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {
    Route::get('/home', function () {
        return redirect('/panel');
    });

    Route::get('/login', 'Ukadev\Blogfolio\Controllers\panel\LoginController@showLoginForm')->name('login');
    Route::get('/logout', 'Ukadev\Blogfolio\Controllers\panel\LoginController@logout')->name('logout');
    // Password Reset Routes...
    //Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    //Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    //Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    //Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

Route::group(['prefix' => 'panel', 'middleware' => 'web'], function () {

    Route::get('/', 'Ukadev\Blogfolio\Controllers\panel\PanelController@indexPanel')->name('panelAdmin');
    Route::get('/profile', 'Ukadev\Blogfolio\Controllers\panel\UsersController@profile')->name('profileAdmin');

    Route::get('/blog', function () {
        return redirect('/panel/blog/posts');
    });
    Route::get('/blog/posts', 'Ukadev\Blogfolio\Controllers\panel\PostsController@index')->name('blogAdmin');
    Route::get('/blog/posts/add', 'Ukadev\Blogfolio\Controllers\panel\PostsController@add')->name('postsAddAdmin');
    Route::post('/blog/posts/add', 'Ukadev\Blogfolio\Controllers\panel\PostsController@store')->name('postsStoreAdmin');
    Route::get('/blog/posts/{id}', 'Ukadev\Blogfolio\Controllers\panel\PostsController@edit')->name('postsEditAdmin');
    Route::put('/blog/posts/{id}', 'Ukadev\Blogfolio\Controllers\panel\PostsController@update')->name('postsUpdateAdmin');
    Route::delete('/blog/posts/{id}', 'Ukadev\Blogfolio\Controllers\panel\PostsController@delete')->name('postsDeleteAdmin');

    Route::get('/blog/categories', 'Ukadev\Blogfolio\Controllers\panel\PostsCategoriesController@index')->name('postsCategoriesAdmin');
    Route::get('/blog/categories/add', 'Ukadev\Blogfolio\Controllers\panel\PostsCategoriesController@add')->name('postsCategoriesAddAdmin');
    Route::post('/blog/categories/add', 'Ukadev\Blogfolio\Controllers\panel\PostsCategoriesController@store')->name('postsCategoriesStoreAdmin');
    Route::get('/blog/categories/{id}', 'Ukadev\Blogfolio\Controllers\panel\PostsCategoriesController@edit')->name('postsCategoriesEditAdmin');
    Route::put('/blog/categories/{id}', 'Ukadev\Blogfolio\Controllers\panel\PostsCategoriesController@update')->name('postsCategoriesUpdateAdmin');
    Route::delete('/blog/categories/{id}', 'Ukadev\Blogfolio\Controllers\panel\PostsCategoriesController@delete')->name('postsCategoriesDeleteAdmin');


    Route::get('/blog/comments', 'Ukadev\Blogfolio\Controllers\panel\CommentsController@index')->name('commentsAdmin');
    Route::get('/blog/comments/{id}', 'Ukadev\Blogfolio\Controllers\panel\CommentsController@show')->name('commentEditAdmin');
    Route::get('/blog/comments/{id}/set/{status}', 'Ukadev\Blogfolio\Controllers\panel\CommentsController@toggleStatus')->name('commentToggleStatusAdmin');
    Route::delete('/blog/comments/{id}', 'Ukadev\Blogfolio\Controllers\panel\CommentsController@delete')->name('commentDeleteAdmin');

    Route::get('/projects/categories', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@categoryShow')->name('projectsCategoriesAdmin');
    Route::get('/projects/categories/add', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@categoryAdd')->name('projectsCategoryAddAdmin');
    Route::get('/projects/categories/{id}', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@categoryEdit')->name('projectsCategoryEditAdmin');
    Route::put('/projects/categories/{id}', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@categoryUpdate')->name('projectsCategoryUpdateAdmin');
    Route::delete('/projects/categories/{id}', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@categoryDelete')->name('postsCategoryDeleteAdmin');

    Route::get('/projects', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@show')->name('projectsAdmin');
    Route::get('/projects/add', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@add')->name('projectsAddAdmin');
    Route::post('/projects/add', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@store')->name('projectsStoreAdmin');
    Route::get('/projects/{id}', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@show')->name('projectsEditAdmin');
    Route::delete('/projects/{id}', 'Ukadev\Blogfolio\Controllers\panel\ProjectsController@delete')->name('projectsDeleteAdmin');

    Route::get('/settings', 'Ukadev\Blogfolio\Controllers\panel\SettingsController@index')->name('settingsAdmin');
    Route::put('/settings', 'Ukadev\Blogfolio\Controllers\panel\SettingsController@update')->name('settingsSetAdmin');


});
