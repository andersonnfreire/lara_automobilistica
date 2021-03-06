<?php

namespace App\Http\Controllers\Filial;

use App\Http\Controllers\Controller;
use App\Model\Filial;
use App\Http\Requests\Filial\FilialRequest;
use App\Model\Automovel;
use Thiagocfn\InscricaoEstadual\Util\Validador;
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
    //Exibindo a pagina de cadastro de filiais
    public function create()
    {
        return view('pages.filial.create-edit');
    }
    //Inserindo dados da filial
    public function store(FilialRequest $request)
    {
        //verificando se a inscrição estadual é valida
        if(Validador::check($request['uf'], $request['ie'])){
            
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
                    return redirect("consultar/filial");
                }
            } catch (\Exception $th) {
                return redirect()->back()->with(['error'=>'Falha ao inserir']);
            }
        }else{
            return redirect()->back()->with(['error'=>'Inscricao nao valida']);
        } 
        
    }

    //Listando as filiais
    public function show()
    {
        $filiais = Filial::paginate(4);
        return view('pages.filial.home',compact('filiais'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Editando a filial 
    public function edit($id) {

        $filial = Filial::find($id)->with('endereco')->first();

        if($filial){
            return view('pages.filial.create-edit', compact('filial'));
        }
        else{
            return redirect()->back()->with(['error'=>'Não encontramos a filial']);
        }
        
    }
    //Dados da filial para serem alterados
    public function update(FilialRequest $request, $id) {
        //validando a inscrição estadual
        if(Validador::check($request['uf'], $request['ie'])){
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
        }else{
            return redirect()->back()->with(['error'=>'Inscricao nao valida']);
        }
    }
    //Exibindo os dados da filial para serem deletados
    public function delete($id){
        $filial = Filial::where('id',$id)->with('endereco')->first();
        
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
    //Excluindo os dados ligados a filial
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
