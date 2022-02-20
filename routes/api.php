<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RoutineController;

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
// });


 
Route::post('/routines', [RoutineController::class, 'addRoutine']);
Route::put('/routines/{id}', [RoutineController::class, 'editRoutine']);
Route::delete('/routines', [RoutineController::class, 'deleteRoutine']);
Route::get('/routines/{id}', [RoutineController::class, 'getRoutineById'] );
Route::get('/routines', [RoutineController::class, 'getAllRoutine']);


