<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SocialController;
use App\Models\User;
use App\Models\Conteudo;
use App\Models\Comentario;
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

//////////////////////////CADASTRO|LOGIN//////////////////////////
Route::group([
    'middleware' => 'api',
    //'prefix' => 'route'
], function ($router) {
    Route::post('/cadastro', [SocialController::class, 'cadastro']);
    Route::post('/login', [SocialController::class, 'login']);

});

//////////////////////////PERFIL//////////////////////////
Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::put('/perfil', [SocialController::class, 'perfil']);
});

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});

//////////////////////////TESTES//////////////////////////
Route::get('/testes', function(){
    //pegar o primeiro user
    $user = User::find(1);
    //salvando o conteudo por user
    /*$user->conteudos()->create([
        'titulo' => 'Conteudo 3',
        'texto' => 'Aqui o texto',
        'imagem' => 'Url da imagem',
        'link' => 'Link',
        'data' => '2021-01-04',
    ]);
    return $user->conteudos;*/

    //Add amigos , para adicionar amigos é necessário ter dois ou mais users
    $user2 = User::find(2);
    
    //primeiro pegar o usr logado attach pega o id do user e adiciona como amigo
    /*$user->amigos()->attach($user2->id);*/

    //remover amigos
    /*$user->amigos()->detach($user2->id);*/

    //adicionar/remover um amigo*/

    //trazendo os amigos
    /*return $user->amigos;*/

    

});