<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;
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
            return ['status' => 'false'];
        }    
    }

    public function perfil(Request $request)
    {
        
        $user = $request->user();
        
        $data = $request->all();
        if(isset($data['password'])){
            //validação se existir senha
            $validacao = Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
                'password' => 'required|string|min:6|confirmed',
            ]);
            if($validacao->fails())
            {
                return $validacao->errors();
            }

            $user->password = bcrypt($data['password']);
        }else{
            //validação sem senha
            $validacao = Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
            ]);

            if($validacao->fails())
            {
                return $validacao->errors();
            }
            $user->name = $data['name'];
            $user->email = $data['email'];
        }
        if(isset($data['imagem'])){
            $time = time();
            $diretorioPai = 'perfils';
            $diretorioImagem = $diretorioPai.DIRECTORY_SEPARATOR.'perfil_id'.$user->id;
            $ext = substr($data['imagem'], 11, strpos($data['imagem'], ';') - 11);
            $urlImagem = $diretorioImagem.DIRECTORY_SEPARATOR.$time.'.'.$ext;
            $file = str_replace('data:image/'.$ext.';base64,','',$data['imagem']);
            $file = base64_decode($file);
            if(!file_exists($diretorioPai)){
                mkdir($diretorioPai,0700);
            }
            if(!file_exists($diretorioImagem)){
                mkdir($diretorioImagem,0700);
            }
            file_put_contents($urlImagem,$file);
            $user->imagem = $urlImagem;
        }

        $user->save();

        $user->imagem = asset($user->imagem);
        $user->token = $user->createToken($user->email)->accessToken;
        return $user; 
        
    }
}
