<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SocialController;
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

//////////////////////////SOCIAL//////////////////////////
Route::group([
    'middleware' => 'api',
    //'prefix' => 'route'
], function ($router) {
    Route::post('/cadastro', [SocialController::class, 'cadastro']);
});

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});
