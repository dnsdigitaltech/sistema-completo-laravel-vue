<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    use HasFactory;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'titulo',
        'texto',
        'imagem',
        'link',
        'data',
    ];

    //trazer as listas de comentários deste conteúdo
    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario');
    }

    //relacionamento de conteudo com determinado usuario, 
    //pertence apenas um usuário e um usuario poderá ter vários conteúdos
    public function user()
        {
        return $this->belongsTo('App\Models\User');
    }

    //relaciomento de curtidas
    public function curtidas()
    {
        return $this->belongsToMany('App\Models\User', 'curtidas', 'conteudo_id', 'user_id');
    }

    //trazer a data formatada
    public function getDataAttribute($value)
    {
        //return date('H:i d/m/Y', strtotime($value)); data normal
        $data = date('H:i d/m/Y', strtotime($value));
        return str_replace(':', 'h', $data);
    }
}
