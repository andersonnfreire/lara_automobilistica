<?php

namespace App\Model;

use App\Model\Filial;
use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'nome','ano','modelo',
                            'cor','numero_chassi','categoria','filial_id'
                          ];

                       
    public function filial(){
        return $this->belongsTo(Filial::class);
    }
    
}
