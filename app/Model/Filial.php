<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $fillable = ['nome','ie','cnpj','endereco_id'];

   
    public function users(){
        return $this->hasMany(User::class);
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }
   
    public function automovel(){
        return $this->hasMany(Automovel::class);
    }
    
}
