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
              Cadastro de Automóvel
          </h1>
      </div>
      
      @if(isset($automovel))
        <form method="post" action="{{ url("consultar/automovel/update/$automovel->id")}}">       
      @else
        <form method="POST" class="form" action="{{ route("automovel")}}">
      @endif
      
        @csrf
          <div class="card-body">
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ @old("nome", isset($automovel->nome)? $automovel->nome : '')}}" required autocomplete="nome" autofocus>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="{{ @old("modelo", isset($automovel->modelo)? $automovel->modelo : '')}}" required autocomplete="modelo" autofocus>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="ano">Ano</label>
                    <input type="text" class="form-control" id="ano" name="ano" value="{{ @old("ano", isset($automovel->ano)? $automovel->ano : '')}}" required autocomplete="ano" autofocus>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="cor">Cor</label>
                    <input type="text" class="form-control" id="cor" name="cor" value="{{ @old("cor", isset($automovel->cor)? $automovel->cor : '')}}" required autocomplete="cor" autofocus>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="numero_chassi">Número de Chassi</label>
                    <input type="text" class="form-control" id="numero_chassi" name="numero_chassi" value="{{ @old("numero_chassi", isset($automovel->numero_chassi)? $automovel->numero_chassi : '')}}" required autocomplete="numero_chassi" autofocus>
                  </div>
              </div>
              <div class="form-row">
                  
                  <div class="form-group col-md-3">
                    <label for="classeFormControlSelect1">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                      <option value="">Escolha a categoria </option>
                      
                      @foreach ($categorias as $categoria)
                        <option value="{{$categoria}}"
                          @if(isset($automovel) && $automovel->categoria == $categoria) 
                              selected
                          @endif
                          >{{$categoria}}
                        </option>    
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="classeFormControlSelect1">Filial</label>
                    <select class="form-control" id="filial" name="filial">
                      <option value="">Escolha a filial</option>
                      @foreach ($filiais as $filial)
                        @if(isset($automovel))
                          @if($automovel->filial->id == $filial->id)
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
          <div class="form-group col">
            <button type="submit" class="btn btn-outline-primary">Confirmar</button>
            <button type="button" class="btn btn-outline-danger">Cancelar</button>
          </div>
        </form>
    </div>
  </div>      
</div>
@endsection