<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishListController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

}); 

Route::post('register',[UserController::class,'register']);
Route::put('/upload-avatar/{id}', [UserController::class,'uploadAvatar']);
Route::get('user/{id}',[UserController::class,'getUser']);
Route::post('login',[UserController::class,'login']);
Route::post('addproduct',[ProductController::class,'addProduct']);
Route::get('list',[ProductController::class,'list']);
Route::get('user/{uid}/products', [ProductController::class, 'getUserProducts']);
Route::delete('delete/{pid}',[ProductController::class,'deleteProduct']);
Route::get('newest-products', [ProductController::class, 'getNewestProducts']);
Route::get('most-expensive-products', [ProductController::class, 'getMostExpensiveProducts']);
Route::put('update/{pid}',[ProductController::class,'updateProduct']);
Route::put('auction/{pid}',[ProductController::class,'updatePrice']);
Route::get('search/{key}', [ProductController::class, 'search']);
Route::get('usersearch/{key}', [UserController::class, 'searchUser']);
Route::get('product/{pid}',[ProductController::class,'getProduct']);
Route::post('/checkEmail', [UserController::class, 'checkEmail']);
Route::post('/checkUsername', [UserController::class, 'checkUsername']);
Route::get('product/{pid}/remaining-time', [ProductController::class, 'getRemainingTime']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::put('user/{id}/update-password', [UserController::class, 'updatePassword']);
Route::post('user/{id}/check-old-password', [UserController::class, 'checkOldPassword']);
Route::get('/top-auctions', [ProductController::class, 'getTopAuctions']);
Route::post('wish',[WishListController::class,'addToWishList']);
Route::get('getproducts/{uid}',[WishListController::class,'getWishList']);
Route::delete('remove-from-wishlist/{uid}/{pid}', [WishListController::class,'removeFromWishList']);
