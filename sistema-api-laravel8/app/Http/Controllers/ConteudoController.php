<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Conteudo;

class ConteudoController extends Controller
{
    public function lista(Request $request)
    {
        $conteudos = Conteudo::with('user')->orderBy('data','DESC')->paginate(5);
        $user = $request->user();
        foreach($conteudos as $key => $conteudo){
            $conteudo->total_curtidas = $conteudo->curtidas()->count();
            $conteudo->comentarios = $conteudo->comentarios()->with('user')->get();//cometários com seus usuários
            $curtiu = $user->curtidas()->find($conteudo->id);
            if($curtiu){
                $conteudo->curtiu_conteudo = true;
            }else{
                $conteudo->curtiu_conteudo = false;
            }
        }

        return ['status'=>true, "conteudos"=>$conteudos ]; 
    }
    
    public function adicionar(Request $request)
    {
        $data = $request->all();
        $user = $request->user();

        //validação
        $validacao = Validator::make($data, [
            'titulo' => 'required|max:255',
            'texto' => 'required',
        ]);

        if($validacao->fails())
        {
            return ['status'=>false, "validacao"=>true, "erros"=>$validacao->errors()];
        }

        $conteudo = new Conteudo;
        $conteudo->titulo = $data['titulo'];
        $conteudo->texto = $data['texto'];
        $conteudo->link = $data['link'] ? $data['link'] : '#';
        $conteudo->imagem = $data['imagem'] ? $data['imagem'] : '#';
        $conteudo->data = date('Y-m-d H:i:s');

        $user->conteudos()->save($conteudo);

        $conteudos = Conteudo::with('user')->orderBy('data','DESC')->paginate(5);
        return ['status'=>true, "conteudos"=>$conteudos ];  
    }

    public function curtir($id, Request $request)
    {
        $conteudo = Conteudo::find($id);
        if($conteudo){
            $user = $request->user();
            $user->curtidas()->toggle($conteudo->id);
            
            return [
                'status'=>true, 
                "curtidas"=>$conteudo->curtidas()->count(), 
                'lista'=> $this->lista($request)
            ];
        }else{
            return ['status'=>false, "error"=>'Conteúdo não existe'];
        }
    }

    public function comentar($id, Request $request)
    {
        $data = $request->all();

        //validação
        $validacao = Validator::make($data, [
            'texto' => 'required',
        ]);

        if($validacao->fails())
        {
            return ['status'=>false, "validacao"=>true, "erros"=>$validacao->errors()];
        }

        $conteudo = Conteudo::find($id);
        if($conteudo){
            $user = $request->user();
            
            $user->comentarios()->create([
                'conteudo_id' => $conteudo->id,
                'texto' => $data['texto'],
                'data' => date('Y-m-d H:i:s')
            ]);
            
            return [
                'status'=>true, 
                'lista'=> $this->lista($request)
            ];
        }else{
            return ['status'=>false, "error"=>'Conteúdo não existe'];
        }
    }
}
