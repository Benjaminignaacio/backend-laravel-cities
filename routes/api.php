<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StreetController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para recursos usando apiResource
Route::apiResource('regions', RegionController::class);
Route::apiResource('provinces', ProvinceController::class);
Route::apiResource('cities', CityController::class);
Route::apiResource('streets', StreetController::class);

// Rutas adicionales si necesitas
Route::get('regions/{region}/provinces', [RegionController::class, 'provinces']);
Route::get('provinces/{province}/cities', [ProvinceController::class, 'cities']);
Route::put('/regions/{id}', [RegionController::class, 'update']);