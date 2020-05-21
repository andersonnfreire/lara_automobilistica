<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome','data_nascimento','sexo',
                           'cpf','cargo_desempenhado','salario',
                           'situacao','password','endereco_id','filial_id'
                          ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function filial(){
        return $this->belongsTo(Filial::class);
    }
    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }

}
