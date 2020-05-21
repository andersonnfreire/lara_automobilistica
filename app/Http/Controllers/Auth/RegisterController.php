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
        $filials = Filial::all();
        return view('pages.funcionario.create-edit',compact('filials'));
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
}
