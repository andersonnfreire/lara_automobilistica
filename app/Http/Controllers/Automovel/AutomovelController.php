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
    //exibindo os dados do automovel para serem cadastrados
    public function create()
    {
        $filiais = Filial::all();
        $categorias = ['entrada','hatch pequeno','hatch médio','sedã médio',
                      'sedã grande','SUV','pick-ups'];
        return view('pages.automovel.create-edit',compact('filiais','categorias'));
    }
    //inserindo os dados do automovel
    public function store(AutomovelRequest $request)
    {
        $automovel = new Automovel;
           
        if($automovel->validarAno($request['ano'])){

            try {
                $automovel->create([
                    'nome' => $request['nome'],
                    'cor' => $request['cor'],
                    'numero_chassi' => $request['numero_chassi'],
                    'modelo' => $request['modelo'],
                    'ano' => $request['ano'],
                    'filial_id' => $request['filial'],
                    'categoria' => $request['categoria'],
                ]);
                if($automovel){
                    return redirect("consultar/automovel");
                }
                else{
                    return redirect()->back()->with(['error'=>'Erro ao inserir']);
                }
                
                
            } catch (\Exception $e) {
                return redirect()->back()->with(['error'=>'Erro ao inserir']);
            }
        }else{
            return redirect()->back()->with(['error'=>'Erro na data']);
        }
    }
    //listando os automoveis
    public function show(){

        $automoveis = Automovel::with('filial')->paginate(4);
        return view('pages.automovel.home',compact('automoveis'));
    }
    //listando os dados de um automovel
    public function edit($id){

        try {
            $automovel = Automovel::where('id',$id)->with('filial')->first();
        
            $filiais = Filial::all();
            $categorias = ['entrada','hatch pequeno','hatch médio','sedã médio',
                          'sedã grande','SUV','pick-ups'];
    
            return view('pages.automovel.create-edit',compact('automovel','categorias','filiais'));

        } catch (\Exception $e) {
            return redirect()->back()->with(['error'=>'Não encontramos o automovel no sistema']);
        }
        
    }
    //alterando os dados do automovel
    public function update(AutomovelRequest $request,$id){
        
        $automovel = new Automovel;

        if($automovel->validarAno($request->ano)){
        
            try {
                
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
                }else{
                    return redirect()->back()->with(['error'=>'Não foi encontrado o automovel']);
                }
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error'=>'Falha ao editar']);
            }
        }else{
            return redirect()->back()->with(['error'=>'Erro na data']);
        }
    }
    //exibindo os dados do automovel para serem deletados
    public function delete($id){
        
        try {
            $automovel = Automovel::where('id',$id)->with('filial')->first();
            return view('pages.automovel.delete', compact('automovel'));

        } catch (\Exception $e) {
            return redirect()->back()->with(['error'=>'Não encontramos o automovel']);
        } 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    //deletando o automovel selecionado
    public function destroy($id) {
        $delete = Automovel::find($id)->delete();
        
        
        if($delete)
        {
            return redirect("consultar/automovel");
        }
        else
        {
            return redirect()->back()->with(['error'=>'Falha ao excluir']);
        }
    }
}
