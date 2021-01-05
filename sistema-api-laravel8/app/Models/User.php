<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    //use HasFactory, Notifiable;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'descricao',
        'imagem',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relacionar um comentario com um usuario [um para muitos]
    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario');
    }

    //relacionar um conteudo com um usuario [um para muitos]
    public function conteudos()
    {
        return $this->hasMany('App\Models\Conteudo');
    }

    //retornar as curtidas do user
    public function curtidas()
    {
        return $this->belongsToMany('App\Models\Conteudo', 'curtidas', 'user_id', 'conteudo_id');
    }

    //retornar os amigos do user
    public function amigos()
    {
        return $this->belongsToMany('App\Models\User', 'amigos', 'user_id', 'amigo_id');
    }

    //trazer a url completa da imagem - definindo mutacao
    public function getImagemAttribute($value)
    {
        return asset($value);
    }
}
