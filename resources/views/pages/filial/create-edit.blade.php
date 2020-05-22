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
                Cadastrar Filial
            </h1>
        </div>
        <form method="post" class="form" action="{{ route("inserir") }}">
          @csrf
          <div class="card-body">
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="ie">Inscrição Estadual (IE)</label>
                    <input type="text" class="form-control" id="ie" placeholder="Informe sua inscrição estadual" name="ie" value="{{ old('ie') }}" required autocomplete="ie" autofocus>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" placeholder="Informe seu cnpj" name="cnpj" value="{{ old('cnpj') }}" required autocomplete="cnpj" autofocus>
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
                    <input class="form-control py-2 col" type="search" value="" name="cep" id="example-search-input">
                    <span class="input-group-append">
                      <button class="btn btn-outline-secondary bg-primary" type="button">
                          <i class="fa fa-search "></i>
                      </button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="logradouro">Logradouro</label>
                  <input type="text" class="form-control" id="logradouro" name="logradouro">
                </div>

                <div class="form-group col-md-1">
                  <label for="numero">Número</label>
                  <input type="number" class="form-control" id="numero" name="numero">
                </div>
                <div class="form-group col-md-3">
                  <label for="complemento">Complemento</label>
                  <input type="text" class="form-control" id="complemento" name="complemento">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" id="bairro" name="bairro">
                </div>
                <div class="form-group col-md-3">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" id="cidade" name="cidade">
                </div>
                <div class="form-group col-md-1">
                  <label for="uf">UF</label>
                  <input type="text" class="form-control" id="uf" name="uf">
                </div>
                <div class="form-group col-md-1">
                  <label for="pais">Pais</label>
                  <input type="text" class="form-control" id="pais" name="pais">
                </div>
              </div>
            </div>
          </div> 
          <div class="form-group col">
            <button type="submit" class="btn btn-outline-primary">Confirmar</button>
            <button type="button" class="btn btn-outline-danger">Cancelar</button>
          </div>
        </form>
    </div>      
</div>
@endsection