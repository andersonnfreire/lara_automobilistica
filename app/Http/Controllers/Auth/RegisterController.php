<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Model\Endereco;
use App\Model\Filial;
use App\Providers\RouteServiceProvider;
use App\Model\User;
use App\User as AppUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function create()
    {
        $filiais = Filial::all();
        $senha = \App\Model\User::random_strings(6);
        return view('pages.funcionario.create-edit',compact('filiais','senha'));
    }

        
    public function store(UserRequest $request)
    {
        //dd($request)

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
        
        return view('pages.funcionario.home');
    }
   
    public function show(){

        $filiais = \App\Model\User::with('filial')->get();
        return view('pages.funcionario.home',compact('filiais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $user = User::where('id',$id)->with('filial','endereco')->first();

        $filiais = Filial::all();

        return view('pages.funcionario.create-edit', compact('user','filiais'));
    }
   
    public function update(UserRequest $request, $id) {
        
        
        $funcionario = new User();
        $user = $funcionario->where('id',$id)->with('endereco')->first();
        if($user)
        {            
            $user->endereco->cep = $request['cep'];
            $user->endereco->logradouro = $request['logradouro'];
            $user->endereco->numero = $request['numero'];
            $user->endereco->complemento = $request['complemento'];
            $user->endereco->bairro = $request['bairro'];
            $user->endereco->cidade = $request['cidade'];
            $user->endereco->uf = $request['uf'];
            $user->endereco->pais = $request['pais'];
            $user->endereco->save();

            $user->nome = $request['nome'];
            $user->password = Hash::make($request['password']);
            $user->sexo     = $request['sexo'];
            $user->situacao = $request['situacao'];
            $user->data_nascimento = $request['data_nascimento'];
            $user->filial_id      = $request['filial'];
            $user->cargo_desempenhado = $request['cargo_desempenhado'];
            $user->cpf = $request['cpf'];
            $user->save();     
            
              //verifica se os dados foram alterados
            //  dd($user->filial->id);  
            if($user)
            {
                return redirect("consultar/funcionario");
            }
            else
            {
                return redirect()->back()->with(['errors'=>'Falha ao editar']);
            }
        }
       
        
    }
    public function resetar($id){
        $senha = \App\Model\User::random_strings(6);

        return back()->with(compact('senha'));
    }
}
