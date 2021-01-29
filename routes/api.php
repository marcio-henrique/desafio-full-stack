<?php

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
$apiUrl = 'App\Http\Controllers\API\\';

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//rotas do provedor de serviços
Route::get('provider/{id}',$apiUrl.'ProviderController@show');
Route::get('provider', $apiUrl.'ProviderController@index');
Route::post('provider',$apiUrl.'ProviderController@store');

//rotas dos serviços
Route::get('service/provider/{id}',$apiUrl.'ServiceController@showServiceWithProviderId');
Route::patch('service/updateStatus/{id}', $apiUrl.'ServiceController@updateStatus');
