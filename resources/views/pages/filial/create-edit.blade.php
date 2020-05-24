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
                Cadastro de Filial
            </h1>
        </div>
        @if(isset($filial))
          <form method="post" action="{{ url("consultar/filial/update/$filial->id")}}">       
        @else
          <form method="post" class="form" action="{{ route("inserir") }}">
        @endif

          @csrf
          <div class="card-body">
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ @old("nome", isset($filial->nome)? $filial->nome : '')}}" required autocomplete="nome" autofocus>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="ie">Inscrição Estadual (IE)</label>
                    <input type="text" class="form-control" id="ie" placeholder="Informe sua inscrição estadual" name="ie" value="{{ @old("ie", isset($filial->ie)? $filial->ie : '')}}" required autocomplete="ie" autofocus>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ @old("cnpj", isset($filial->cnpj)? $filial->cnpj : '')}}" required autocomplete="cnpj" autofocus>
                  </div>
              </div>
          </div>  
          <div class="card">
            <div class="card-header bg-primary text-white">
              Endereço
            </div>  
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputCEP">CEP</label>
                  <div class="input-group">
                    <input class="form-control py-2 col" type="search" id="cep" name="cep" value="{{ @old("ie", isset($filial->endereco->cep)? $filial->endereco->cep : '')}}" name="cep" id="example-search-input">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="logradouro">Logradouro</label>
                  <input type="text" class="form-control" id="logradouro" name="logradouro" value="{{ @old("logradouro", isset($filial->endereco->logradouro)? $filial->endereco->logradouro : '')}}">
                </div>

                <div class="form-group col-md-1">
                  <label for="numero">Número</label>
                  <input type="number" class="form-control" id="numero" name="numero" value="{{ @old("numero", isset($filial->endereco->numero)? $filial->endereco->numero : '')}}">
                </div>
                <div class="form-group col-md-3">
                  <label for="complemento">Complemento</label>
                  <input type="text" class="form-control" id="complemento" name="complemento" value="{{ @old("complemento", isset($filial->endereco->complemento)? $filial->endereco->complemento : '')}}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" id="bairro" name="bairro" value="{{ @old("bairro", isset($filial->endereco->bairro)? $filial->endereco->bairro : '')}}">
                </div>
                <div class="form-group col-md-3">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" id="cidade" name="cidade" value="{{ @old("cidade", isset($filial->endereco->cidade)? $filial->endereco->cidade : '')}}" readonly>
                </div>
                <div class="form-group col-md-1">
                  <label for="uf">UF</label>
                  <input type="text" class="form-control" id="uf" name="uf" value="{{ @old("uf", isset($filial->endereco->uf)? $filial->endereco->uf : '')}}" readonly>
                </div>
              </div>
            </div>
          </div> 
          <div class="form-group col">
            <button type="submit" class="btn btn-outline-primary">Confirmar</button>
            <a type="submit" class="btn btn-danger btn-close" href="{{ route('home') }}">Cancel</a>
          </div>
        </form>
    </div>      
</div>
@endsection