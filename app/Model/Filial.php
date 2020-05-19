<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $fillable = ['nome','ie','cnpj'];

   
    public function users(){
        return $this->hasMany(User::class);
    }
   
    public function automovel(){
        return $this->belongsTo(Automovel::class);
    }
}
