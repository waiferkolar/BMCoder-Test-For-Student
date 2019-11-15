<?php

use Illuminate\Http\Request;




Route::post("/login","Api\ApiUserController@login");

Route::group(["middleware"=>"jwt.auth"],function(){
    Route::get("/cat/all","Api\ApiCategoryController@allCat");
    Route::get("/tuts/all","Api\ApiCategoryController@allTutorial");
    Route::get("/user",function(Request $request){
        return $request->user();
    });
});
