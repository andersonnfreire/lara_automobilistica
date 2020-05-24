<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Model\Endereco;
use App\Model\Filial;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
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
    //Exibindo a pagina de cadastro dos funcionarios
    public function create()
    {
        $filiais = Filial::all();
        $senha = \App\Model\User::random_strings(6);
        return view('pages.funcionario.create-edit',compact('filiais','senha'));
    }

    //Funcionario sendo cadastrado no sistema    
    public function store(UserRequest $request)
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
    
            $user = User::create([
                'nome' => $request['nome'],
                'cpf' => $request['cpf'],
                'password' => Hash::make($request['password']),
                'sexo'     => $request['sexo'],
                'situacao' => $request['situacao'],
                'data_nascimento' => $request['data_nascimento'],
                'filial_id' => $request['filial'],
                'cargo_desempenhado' => $request['cargo_desempenhado'],
                'endereco_id' => $endereco,
            ]);
            if($user)
            {
                return redirect("consultar/funcionario");
            }    
        }catch (\Exception $e) {
            return redirect()->back()->with(['error'=>'Falha ao inserir']);
        } 
    }
    //Exibindo uma lista de funcionarios
    public function show(){

        $filiais = \App\Model\User::with('filial')->get();
        return view('pages.funcionario.home',compact('filiais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Exibindo os dados do funcionario para serem alterados
    public function edit($id) {

        $user = User::where('id',$id)->with('filial','endereco')->first();

        if($user)
        {
            $filiais = Filial::all();

            return view('pages.funcionario.create-edit', compact('user','filiais'));
        }
        else
        {
            return redirect()->back()->with(['error'=>'Ocorreu uma falha']);
        }
    }
    //Alterando os dados do funcionario
    public function update(UserRequest $request, $id) {
        
        $funcionario = new User();
        $user = $funcionario->where('id',$id)->with('endereco')->first();
        
        if($user)
        {
            try {
                
                if(!(strcmp($request['password'],"000000")==0)){
                    $user->password = Hash::make($request['password']);
                }

                $user->endereco->cep = $request['cep'];
                $user->endereco->logradouro = $request['logradouro'];
                $user->endereco->numero = $request['numero'];
                $user->endereco->complemento = $request['complemento'];
                $user->endereco->bairro = $request['bairro'];
                $user->endereco->cidade = $request['cidade'];
                $user->endereco->uf = $request['uf'];
                $user->endereco->save();

                $user->nome = $request['nome'];
                $user->sexo     = $request['sexo'];
                $user->situacao = $request['situacao'];
                $user->data_nascimento = $request['data_nascimento'];
                $user->filial_id      = $request['filial'];
                $user->cargo_desempenhado = $request['cargo_desempenhado'];
                $user->cpf = $request['cpf'];
                $user->save();     
                if($user)
                {
                    return redirect("consultar/funcionario");
                }
            } catch (\Exception $th) {
                return redirect()->back()->with(['error'=>'Falha ao editar os dados do funcionario']);
            }
        }
        else{
            return redirect()->back()->with(['error'=>'Não existe o usuario selecionado']);
        }
    }
    //Gerando a senha alfanumerica de 6 caracteres
    public function resetar($id){
        $senha = \App\Model\User::random_strings(6);
        if($senha){
            return back()->with(compact('senha'));
        }
        else{
            return redirect()->back()->with(['error'=>'Falha gerar a senha']);
        }
        
    }
    //Exibindo os dados do usuario para serem deletados
    public function delete($id){
        $funcionario = User::find($id)->with('filial')->first();
        if($funcionario){
            return view('pages.funcionario.delete', compact('funcionario'));
        }
        else{
            return redirect()->back()->with(['error'=>'Não existe um funcionario para excluir']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    //Excluindo o usuário
    public function destroy($id) {
        $user = User::find($id)->endereco;
        $delete = $user->delete();
        
        if($delete)
        {
            return redirect("consultar/funcionario");
        }
        else
        {
            return redirect()->back()->with(['error'=>'Falha ao excluir']);
        }
    }
}
