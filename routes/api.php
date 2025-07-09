<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/v1/getnews",[NewsController::class,"getallnews"]);
Route::get("/v1/getnewspaginated",[NewsController::class,"getnewspaginated"]);
Route::get("/v1/news/{slug}",[NewsController::class,"getnews"]);



Route::get("/v1/getcategories",[NewsController::class,"getallcategories"]);
Route::get("/v1/getallauthor",[NewsController::class,"getallauthor"]);
Route::get("/v1/getauthor/{name}",[NewsController::class,"getauthor"]);
Route::get("/v1/getbannernews",[NewsController::class,"getThreenews"]);
Route::get("/v1/gettopviews",[NewsController::class,"gettopviews"]);
Route::get("/v1/getlatest",[NewsController::class,"getlatest"]);
Route::get("/v1/get-editor-artical",[NewsController::class,"getEditorArtical"]);




// addComment
Route::controller(BlogController::class)->prefix("/v1/blog")->group(function(){
    Route::get("/all","getAllBlog");
    Route::get("/single/{slug}","getblog");
});

Route::post("/v1/addcomment",[BlogController::class,"addComment"]);
Route::post("/v1/internship",[BlogController::class,"addInternship"]);