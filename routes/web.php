<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



// GET, POST , PUT, PATCH, DELETE (method http)

Route::get('/',function(){
    echo 'Trang chủ';
});


// Điều hướng qua action của controller
// php artisan make:controller Tên Controller

// Lab1
Route::get('thongtinsv',[ProductController::class,'showProduct']);


//Buổi 2

Route::get('query-builder',[ProductController::class,
'queryBuilder']);