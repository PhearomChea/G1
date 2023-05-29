<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    FarmerController,
    AuthenticationController,
    MapController,
    UserController,
    ProvinceController,
    LocationController,
    DroneController,
    PlanController,
    InstructionController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function() {
    //Route for logout
    Route::post('register/sign_out',[AuthenticationController::class, 'sign_out']);
    //Route for user 
    Route::prefix('users')->group(function(){
        Route::resource('user', UserController::class);
    });
    //Route for location
    Route::prefix('locations')->group(function(){
        Route::resource('location', LocationController::class);
    });
    //Route for provinces
    Route::prefix('provinces')->group(function(){
        Route::resource('province', ProvinceController::class);
    });
    //Route for instructions
    Route::prefix('instructions')->group(function(){
        Route::resource('instruction', InstructionController::class);
    });
    //Route for drone
    Route::prefix('drones')->group(function(){
        Route::resource('drone', DroneController::class);
    });
    Route::get('drones/code/{id}',[DroneController::class,'droneInfo']);
    Route::get('drones/code/{id}/location',[DroneController::class, 'getLocationByDroneId']);
    Route::put('drones/code/{code}', [DroneController::class, 'updateByDroneId']);
    //Route for plane
    Route::prefix('plans')->group(function(){
        Route::resource('plan', PlanController::class);
    });
    Route::get('plans/plan_name/{name}', [PlanController::class,'getSpecifictPlan']);
    //Route for maps
    Route::prefix('maps')->group(function(){
        Route::resource('map', MapController::class);
    });
    Route::get('maps/map/{provice}/{id}',[MapController::class,'dowloadImage']);
    Route::post('maps/map/{provice}/{id}',[MapController::class,'addNewMap']);
    Route::delete('maps/map/{provice}/{id}',[MapController::class,'deleteImage']);
});
Route::post('register/sign_up',[AuthenticationController::class, 'sign_up']);
Route::post('register/sign_in',[AuthenticationController::class, 'Login']);

