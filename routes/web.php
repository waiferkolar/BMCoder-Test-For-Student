<?php


Route::get('/', 'PageController@index');

Route::get("/home", 'PageController@index');

Route::get("/login", 'Auth\LoginController@showLoginForm');
Route::post("/login", 'Auth\LoginController@login');
Route::get("/logout", 'Auth\LoginController@logout');
Route::get("/register", 'Auth\RegisterController@showRegistrationForm');
Route::post("/register", 'Auth\RegisterController@register');

/**
 * For Admin Only
 */

Route::group(["namespace" => "Admin", "prefix" => "admin", "middleware" => "Aware"], function () {
    Route::get("/home", "AdminController@index");
    Route::get("/user/all", "AdminUserController@index");
    Route::get("/role/{uid}/add", "AdminUserController@addRole");
    Route::get("/role/insert/{uid}/{rname}", "AdminUserController@insertRole");
    Route::get("/role/remove/{uid}/{rname}", "AdminUserController@removeRole");
    Route::get("/user/{id}/ban","AdminUserController@ban");
    Route::get("/user/{id}/edit","AdminUserController@edit");
    Route::post("/user/{id}/edit","AdminUserController@update");
});

