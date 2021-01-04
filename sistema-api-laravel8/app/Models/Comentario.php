<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conteudo_id',
        'texto',
        'data',
    ];

    //Lista o usuário que é dono do comentário
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //relacionamento de comnetario com conteúdo
    //um conteúdo poderá ter vário comentários, o cometarop pertence a um conteudo
    //um para muitos
    public function conteudo()
    {
        return $this->belongsTo('App\Models\Conteudo');
    }
}
