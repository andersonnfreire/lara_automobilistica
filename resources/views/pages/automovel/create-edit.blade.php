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
              Cadastrar Automóvel
          </h1>
      </div>
        <form method="POST" class="form" action="{{ route("cadastrar.automovel")}}">
          <div class="card-body">
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="cor">Cor</label>
                    <input type="text" class="form-control" id="cor" name="cor" value="{{ old('cor') }}" required autocomplete="cor" autofocus>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="numero_chassi">Número de Chassi</label>
                    <input type="text" class="form-control" id="numero_chassi" name="numero_chassi" value="{{ old('numero_chassi') }}" required autocomplete="numero_chassi" autofocus>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="cargo_desempenhado">Cargo Desempenhado</label>
                    <input type="text" class="form-control" id="cargo_desempenhado" value="{{ old('cargo_desempenhado') }}"placeholder="Informe seu cargo" name="cargo_desempenhado" required autocomplete="numero_chassi" autofocus>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="classeFormControlSelect1">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                      <option value="entrada">entrada</option>
                      <option value="hatch pequeno">hatch pequeno</option>
                      <option value="hatch médio">hatch médio</option>
                      <option value="sedã médio">sedã médio</option>
                      <option value="sedã grande">sedã grande</option>
                      <option value="SUV">SUV</option>
                      <option value="pick-ups">pick-ups</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="classeFormControlSelect1">Filial</label>
                    <select class="form-control" id="filial" name="filial">
                      <option value="">Escolha a filial</option>
                      @foreach ($filiais as $filial)
                        <option value="{{$filial->id}}">{{$filial->nome}}</option>
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