<?php

use Illuminate\Http\Request;

use App\Http\Resources\Users;
use App\Http\Controllers\User;
use App\Http\Resources\Deleted;
use App\Number;



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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('dlt','User@getData' );

Route::get('apc',function(){
    return Deleted::collection(Number::all());
} );

