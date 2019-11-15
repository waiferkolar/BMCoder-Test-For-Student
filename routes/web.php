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
    Route::get("/permission/{uid}/add", "AdminUserController@addPermission");
    Route::get("/role/insert/{uid}/{rname}", "AdminUserController@insertRole");
    Route::get("/permission/insert/{uid}/{pname}", "AdminUserController@insertPermission");
    Route::get("/role/remove/{uid}/{rname}", "AdminUserController@removeRole");
    Route::get("/permission/remove/{uid}/{pname}", "AdminUserController@removePermission");
    Route::get("/user/{id}/ban", "AdminUserController@ban");
    Route::get("/user/{id}/edit", "AdminUserController@edit");
    Route::post("/user/{id}/edit", "AdminUserController@update");

    /**
     * For Category
     */

    Route::get("cat/all", "AdminCategoryController@index");
    Route::get("cat/create/{parent?}", "AdminCategoryController@create");
    Route::post("cat/create/{parent?}", "AdminCategoryController@save");
    Route::get("cat/edit/{id}", "AdminCategoryController@edit");
    Route::post("cat/edit/{id}", "AdminCategoryController@update");
    Route::get("cat/delete/{id}", "AdminCategoryController@destory");


    /*
     * For Tutorial
     */
    Route::get("tut/all", "AdminTutorialController@index");
    Route::get("tut/create", "AdminTutorialController@create");
    Route::post("tut/create", "AdminTutorialController@save");
    Route::get("tut/edit/{id}", "AdminTutorialController@edit");
    Route::post("tut/edit/{id}", "AdminTutorialController@update");
    Route::get("tut/delete/{id}", "AdminTutorialController@destroy");

    /**
     * For Roles
     */
    Route::get("role/all","AdminRoleCotnroller@index");
    Route::get("role/create","AdminRoleCotnroller@create");
    Route::post("role/create","AdminRoleCotnroller@store");
    Route::get("role/edit/{id}","AdminRoleCotnroller@edit");
    Route::post("role/edit/{id}","AdminRoleCotnroller@update");
    Route::get("role/delete/{id}","AdminRoleCotnroller@destory");

    /**
     * For Permission
     */

    Route::get("permission/all","AdminPermissionController@index");
    Route::get("permission/create","AdminPermissionController@create");
    Route::post("permission/create","AdminPermissionController@store");
    Route::get("permission/edit/{id}","AdminPermissionController@edit");
    Route::post("permission/edit/{id}","AdminPermissionController@update");
    Route::get("permission/delete/{id}","AdminRoleCotnrAdminPermissionControlleroller@destory");
});


