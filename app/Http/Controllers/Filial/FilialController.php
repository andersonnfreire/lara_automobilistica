<?php

namespace App\Http\Controllers\Filial;

use App\Http\Controllers\Controller;
use App\Model\Filial;
use App\Http\Requests\Filial\FilialRequest;
use App\Model\Endereco;

class FilialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.filial.create-edit');
    }

    public function store(FilialRequest $request)
    {
      
        $validated = $request->validated();
        
        $endereco = Endereco::create([
            'cep'         => $request['cep'],
            'logradouro'  => $request['logradouro'],
            'numero'      => $request['numero'],
            'complemento' => $request['complemento'],
            'bairro'      => $request['bairro'],
            'cidade'      => $request['cidade'],
            'uf'          => $request['uf'],
            'pais'        => $request['pais'],                    
        ])->id;

        $filial = Filial::create([
            'nome' => $request['nome'],
            'ie' => $request['ie'],
            'cnpj' => $request['cnpj'],
            'endereco_id' => $endereco,
        ]);
        
        return view('pages.filial.home');
    }
}
