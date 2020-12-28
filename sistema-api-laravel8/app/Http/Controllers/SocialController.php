<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastro(Request $request)
    {
        $data = $request->all();
        
        //validação
        $validacao = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validacao->fails())
        {
            return $validacao->errors();
        }
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->token = $user->createToken($user->email)->accessToken;

        return $user;        
    }

    public function login(Request $request)
    {
        $data = $request->all();
        
        //validação
        $validacao = Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if($validacao->fails())
        {
            return $validacao->errors();
        }
        
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            $user = auth()->user();
            $user->token = $user->createToken($user->email)->accessToken;
            return $user;  
        }else{
            return ['error' => 'login ou senha inválido(s)'];
        }    
    }
}
