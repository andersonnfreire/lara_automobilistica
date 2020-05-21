<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Model\Endereco;
use App\Model\Filial;
use App\Providers\RouteServiceProvider;
use App\Model\User;
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
    public function show()
    {

        $filials = Filial::all();

        
        return view('pages.funcionario.create-edit',compact('filials'));
    }

        
    public function store(Request $request)
    {
        dd($request);

        /*$validated = $request->validated();

        
        if($validated->fails())
        {
            return redirect()
            ->route('show')
            ->withErrors($validated)
            ->withInput();
        }
        else{
            return view('pages.funcionario.home');
        }
        /* if($filial)


        $endereco = Endereco::create([
                   'cep'         => $data['cep'],
                   'logradouro'  => $data['logradouro'],
                   'numero'      => $data['numero'],
                   'complemento' => $data['complemento'],
                   'bairro'      => $data['bairro'],
                   'cidade'      => $data['cidade'],
                   'uf'          => $data['uf'],
                   'pais'        => $data['pais'],                    
        ])->id;
         */
        


        /* return User::create([
            'nome' => $data['nome'],
            'cpf' => $data['cpf'],
            'password' => Hash::make($data['password']),
        ]); */
    }
}
