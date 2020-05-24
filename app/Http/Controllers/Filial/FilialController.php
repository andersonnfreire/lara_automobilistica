<?php

namespace App\Http\Controllers\Filial;

use App\Http\Controllers\Controller;
use App\Model\Filial;
use App\Http\Requests\Filial\FilialRequest;
use App\Model\Automovel;
use App\Model\Endereco;
use App\Model\User;

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
    
        try {
            $endereco = Endereco::create([
                'cep'         => $request['cep'],
                'logradouro'  => $request['logradouro'],
                'numero'      => $request['numero'],
                'complemento' => $request['complemento'],
                'bairro'      => $request['bairro'],
                'cidade'      => $request['cidade'],
                'uf'          => $request['uf'],                    
            ])->id;
    
            $filial = Filial::create([
                'nome' => $request['nome'],
                'ie' => $request['ie'],
                'cnpj' => $request['cnpj'],
                'endereco_id' => $endereco,
            ]);
            
            if($filial){
                return view('pages.filial.home');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with(['error'=>'Falha ao inserir']);
        } 
        
    }
    public function show()
    {
        $filiais = Filial::all();
        return view('pages.filial.home',compact('filiais'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $filial = Filial::find($id)->with('endereco')->first();

        if($filial){
            return view('pages.filial.create-edit', compact('filial'));
        }
        else{
            return redirect()->back()->with(['error'=>'Não encontramos a filial']);
        }
        
    }
    public function update(FilialRequest $request, $id) {
        
        try {
            $filial = new Filial();
        
            $update = $filial->where('id',$id)->with('endereco')->first();
            
            if($update)
            {            
                $update->endereco->cep = $request['cep'];
                $update->endereco->logradouro = $request['logradouro'];
                $update->endereco->numero = $request['numero'];
                $update->endereco->complemento = $request['complemento'];
                $update->endereco->bairro = $request['bairro'];
                $update->endereco->cidade = $request['cidade'];
                $update->endereco->uf = $request['uf'];
                $update->endereco->save();

                $update->nome = $request['nome'];
                $update->ie = $request['ie'];
                $update->cnpj = $request['cnpj'];
                $update->save();     
                
                //verifica se os dados foram alterados
                //  dd($user->filial->id);  
                if($update)
                {
                    return redirect("consultar/filial");
                }
            }
            else{
                return redirect()->back()->with(['error'=>'Não conseguimos encontrar o usuario']);
            }
        } catch (\Exception $th) {
            return redirect()->back()->with(['error'=>'Falha ao editar']);
        }
    }
    public function delete($id){
        $filial = Filial::find($id)->with('endereco')->first();
        
        if($filial){
            return view('pages.filial.delete', compact('filial'));
        }
        else{
            return redirect()->back()->with(['error'=>'Não encontramos a filial para ser excluida']);
        }
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        try {
            $automovel = new Automovel();
            $user = new User();
            $filial = new Filial();

            $idFilial = $automovel->where('filial_id',$id)->delete();
            $idUser = $user->where('filial_id',$id)->delete();
            $idEndereco = $filial->find($id)->endereco;
            $delete = $idEndereco->delete();

       
            if($delete){
                return redirect("consultar/filial");
            }else{
                return redirect()->back()->with(['error'=>'Falha ao excluir']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error'=>'Falha ao excluir']);
        }
    }
}
