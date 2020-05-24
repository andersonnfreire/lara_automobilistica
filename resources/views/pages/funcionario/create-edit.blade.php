@extends('layouts.app')

@section('content')
<div class="container">

  @if(isset($errors) && count($errors) > 0)

  <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <p>{{$error}}</p>
      @endforeach
  </div>

  @endif

  <div class="card border-primary mb-3" style="max-width: auto;">
      
      <div class="card-header text-white bg-primary">
          <h1 class="title-pg">
              Cadastro de Funcionários
          </h1>
      </div>
      
      @if(isset($user))
      <div class="card-body" id="form">
        <div class="form-row">
          <div class="form-group">
            <label for="password">Esqueceu a senha?</label>
            <form method="post" action="{{ route('teste',$user->id)}}" >
              {{ method_field('PUT') }}
              @csrf
              <input class="btn btn-link bg-primary text-white" type="submit" value="Gerar">
            </form>
          </div>
        </div>
      </div>
      <form method="post" action="{{ url("consultar/funcionario/update/$user->id")}}">       
      @else
        <form method="POST" class="form" action="{{ route("cadastrar")}}" >
      @endif
        @csrf
        <div class="card-body" id="form">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="nome">Nome</label>
              <input id="nome" type="text" class="form-control" name="nome" value="{{ isset($user->nome)? $user->nome : ''}}" required autocomplete="nome" autofocus>
            </div>

            <div class="form-group col-md-2">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control" oninput="mascara(this)" name="cpf" value="{{ @old("cpf", isset($user->cpf)? $user->cpf : '')}}" required autocomplete="cpf" autofocus>                
            </div>
            
            <div class="form-group col-md-2">
              @if (Session::has('senha') or isset($senha))
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="myInput" value="{{ isset($senha)? $senha: session('senha')}}" readonly>
                <input type="checkbox" onclick="exibirSenha()">Show Password
              @else
                <label for="password">Password </label>
                <input type="password" class="form-control" name="password" value="000000" readonly>
              @endif
              
            </div>
                
          </div>
            <div class="form-row">

              <div class="form-group col-md-4">
                <label for="sexo">Sexo</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="K" checked>
                  <label class="form-check-label" for="sexo">
                    Masculino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="{{ @old("sexo", isset($user->sexo)? $user->sexo : 'F')}}" checked>
                  <label class="form-check-label" for="sexo">
                    Feminino
                  </label>
                </div>
              </div>

              <div class="form-group col-md-3">
                <label for="data_nascimento">Data de Nascimento</label>
                <input onchange="validardataDeNascimento(this.value);" type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ @old("data_nascimento", isset($user->data_nascimento)? $user->data_nascimento : 'M')}}">
              </div>
              
          </div>
          <div class="form-row">

            <div class="form-group col-md-4">
              <label for="inputAddress">Situação</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="situacao" id="situacao1" value="{{ @old("situacao", isset($user->situacao) ? $user->situacao : '1')}}" checked>
                <label class="form-check-label" for="situacao">
                  Ativo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="situacao" id="situacao2" value="{{ @old("situacao", isset($user->situacao)? $user->situacao : '0')}}" checked>
                <label class="form-check-label" for="situacao">
                  Inativo
                </label>
              </div>
            </div>

            <div class="form-group col-md-3">
              <label for="cargo_desempenhado">Cargo Desempenhado</label>
              <input type="text" class="form-control" id="cargo_desempenhado" placeholder="Informe seu cargo" name="cargo_desempenhado" value="{{ @old("cargo_desempenhado", isset($user->cargo_desempenhado)? $user->cargo_desempenhado : '')}}">            
            </div>
            <div class="form-group col-md-3">
              <label for="filial">Filial</label>
              <select class="form-control" id="filial" name="filial">
                <option value="">Escolha a filial</option>

                  @foreach ($filiais as $filial)
                    @if(isset($user))
                      @if($user->filial->id == $filial->id)
                        <option value="{{$filial->id}}" selected>{{$filial->nome}}</option>
                      @else
                        <option value="{{$filial->id}}">{{$filial->nome}}</option>
                      @endif
                    @else
                    <option value="{{$filial->id}}">{{$filial->nome}}</option>
                    @endif                    
                  @endforeach               
              </select>
            </div>
          </div>
        </div>
        <div class="card" id="form">
          <div class="card-header bg-primary text-white">
            Endereço
          </div>  
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="endereco">CEP</label>
                <div class="input-group">
                  <input class="form-control py-2 col" id="cep" name="cep" type="search" value="{{ @old("cep", isset($user->endereco->cep)? $user->endereco->cep : '')}}" name="cep" id="example-search-input">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4 ">
                <label for="endereco">Logradouro</label>
                <input type="text" class="form-control" id="rua" name="logradouro" value="{{ @old("logradouro", isset($user->endereco->logradouro)? $user->endereco->logradouro : '')}}">
              </div>

              <div class="form-group col-md-1">
                <label for="endereco">Número</label>
                <input type="number" class="form-control" id="numero" name="numero" value="{{ @old("numero", isset($user->endereco->numero)? $user->endereco->numero : '')}}">      
              </div>
              <div class="form-group col-md-3">
                <label for="endereco">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" value="{{ @old("complemento", isset($user->endereco->complemento)? $user->endereco->complemento : '')}}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="endereco">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="{{ @old("bairo", isset($user->endereco->bairro)? $user->endereco->bairro : '')}}">
              </div>
              <div class="form-group col-md-3">
                <label for="endereco">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="{{ @old("cidade", isset($user->endereco->cidade)? $user->endereco->cidade : '')}}" readonly>
                             
              </div>

              <div class="form-group col-md-1">
                <label for="endereco">Estado</label>
                <input type="text" class="form-control" id="uf" name="uf" value="{{ @old("uf", isset($user->endereco->uf)? $user->endereco->uf : '')}}" readonly>
              </div>
            </div>
          </div>
        </div> 
        <div class="form-group col">
          <button type="submit" class="btn btn-primary">Confirmar</button>
          <a type="submit" class="btn btn-danger btn-close" href="{{ route('home') }}">Cancel</a>
        </div>
      </form>
  </div>
</div>
@endsection