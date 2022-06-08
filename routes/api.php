<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\KegiatanApiController;
use App\Http\Controllers\UKMApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });`
Route::post('/auth/register', [AuthApiController::class, 'register']);
Route::post('/auth/login', [AuthApiController::class, 'login']);
Route::get('/ukm',[UKMApiController::class, 'index']);
Route::post('/ukm',[UKMApiController::class, 'store']);
Route::get('/ukm/{id}/edit',[UKMApiController::class, 'edit']);
Route::get('ukm/{id}',[UKMApiController::class, 'show']);
Route::put('/ukm/{id}',[UKMApiController::class, 'update']);
Route::delete('/ukm/{id}',[UKMApiController::class, 'destroy']);
Route::get('/kegiatan',[KegiatanApiController::class, 'index']);
Route::post('/kegiatan',[KegiatanApiController::class, 'store']);
Route::get('/kegiatan/{id}/edit',[KegiatanApiController::class, 'edit']);
Route::get('kegiatan/{id}',[KegiatanApiController::class, 'show']);
Route::put('/kegiatan/{id}',[KegiatanApiController::class, 'update']);
Route::delete('/kegiatan/{id}',[KegiatanApiController::class, 'destroy']);
