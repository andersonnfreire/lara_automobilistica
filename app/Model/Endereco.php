<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Endereco extends Model
{
    protected $fillable = ['cep','logradouro','numero','complemento',
    'bairro','cidade','uf'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function filial(){
        return $this->hasOne(Filial::class);
    }
    
}
