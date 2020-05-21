<?php

namespace App\Model;

use App\Filial;
use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'nome','ano','modelo',
                            'cor','numero_chassi','categoria'
                          ];

                       
    public function filial(){
        return $this->belongsTo(Filial::class);
    }
    
}
