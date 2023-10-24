<?php

use App\Http\Controllers\Api\V1\SkillController;
use App\Http\Controllers\ProduksController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TableBarangController;
use App\Http\Controllers\TableUserController;
use App\Http\Controllers\TablePesananController;


use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('skills', SkillController::class);
    Route::apiResource('produks', ProduksController::class);
    
});


Route::get('/table-users', [TableUserController::class, 'index']);
Route::get('/table-users/{id}', [TableUserController::class, 'show']);
Route::post('/table-users', [TableUserController::class, 'store']);


Route::get('/table-barangs', [TableBarangController::class, 'index']);
Route::get('/table-barangs/{id}', [TableBarangController::class, 'show']);
Route::post('/table-barangs', [TableBarangController::class, 'store']);






Route::get('/admin', [AdminController::class, 'index']);




Route::get('/admin/create', [AdminController::class, 'create']);


Route::post('/admin', [AdminController::class, 'store']);


Route::get('/admin/{id}', [AdminController::class, 'show']);


Route::get('/admin/{id}/edit', [AdminController::class, 'edit']);


Route::put('/admin/{id}', [AdminController::class, 'update']);


Route::delete('/admin/{id}', [AdminController::class, 'destroy']);

Route::middleware('auth:api')->group(function (){
    Route::post('/login', [AuthController::class, 'login']);
});

