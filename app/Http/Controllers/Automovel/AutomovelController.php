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
        $categorias = ['entrada','hatch pequeno','hatch médio','sedã médio',
                      'sedã grande','SUV','pick-ups'];
        return view('pages.automovel.create-edit',compact('filiais','categorias'));
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
    public function show(){

        $automoveis = Automovel::with('filial')->get();
        return view('pages.automovel.home',compact('automoveis'));
    }

    public function edit($id){

        $automovel = Automovel::where('id',$id)->with('filial')->first();
        
        $filiais = Filial::all();
        $categorias = ['entrada','hatch pequeno','hatch médio','sedã médio',
                      'sedã grande','SUV','pick-ups'];

        return view('pages.automovel.create-edit',compact('automovel','categorias','filiais'));
    }

    public function update(AutomovelRequest $request,$id){
        $automovel = new Automovel;

        $automoveis = $automovel->where('id',$id)->first();
        if($automoveis){

            if(strcmp($automoveis->numero_chassi,$request->numero_chassi)!=0){
                $automoveis->numero_chassi = $request->numero_chassi;
            }
            $automoveis->nome = $request->nome;
            $automoveis->modelo = $request->modelo;
            $automoveis->ano = $request->ano;
            $automoveis->cor = $request->cor;
            $automoveis->categoria = $request->categoria;
            $automoveis->filial_id = $request->filial;
            $automoveis->save();
            
            if($automoveis)
            {
                return redirect("consultar/automovel");
            }
            else
            {
                return redirect()->back()->with(['errors'=>'Falha ao editar']);
            }
        }
    }
    public function delete($id){
        $automovel = Automovel::find($id)->with('filial')->first();
        
        return view('pages.automovel.delete', compact('automovel'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $delete = Automovel::find($id)->delete();
        
        
        if($delete)
        {
            return redirect("consultar/automovel");
        }
        else
        {
            return redirect()->back()->with(['errors'=>'Falha ao excluir']);
        }
    }
}
