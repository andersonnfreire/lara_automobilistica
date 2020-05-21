<?php

namespace App\Http\Controllers\Automovel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Automovel\AutomovelRequest;
use App\Model\Automovel;
use App\Model\Filial;

class AutomovelController extends Controller
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
        $filiais = Filial::all();
        return view('pages.automovel.create-edit',compact('filiais'));
    }
    public function store(AutomovelRequest $request)
    {
       // dd($request);

        $validated = $request->validated();
        
        $automovel = Automovel::create([
            'nome' => $request['nome'],
            'cor' => $request['cor'],
            'numero_chassi' => $request['numero_chassi'],
            'modelo' => $request['modelo'],
            'ano' => $request['ano'],
            'filial_id' => $request['filial'],
            'categoria' => $request['categoria'],
        ]);
        
        return view('pages.automovel.home');
    }
}
