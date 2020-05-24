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
    public function validarAno($ano)
    {
    
        $ini_ano         =   strtotime(date('Y') - 100); 
        $fim_ano           =   strtotime(date('Y'));
        $year      =   strtotime($ano);

     return (($year >= $ini_ano) && ($year <= $fim_ano));
    }
    
}
