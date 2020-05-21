@extends('layouts.app')

@section('content')
<div class="container">
  <form>
      <div class="card border-primary mb-3" style="max-width: auto;">
          <div class="card-header text-white bg-primary">
              <h1 class="title-pg">
                  Cadastrar Automóvel
              </h1>
          </div>
          <div class="card-body">
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="cor">Cor</label>
                    <input type="text" class="form-control" id="cor" name="cor">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="numero_chassi">Número de Chassi</label>
                    <input type="text" class="form-control" id="numero_chassi" name="numero_chassi">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="cargo_desempenhado">Cargo Desempenhado</label>
                    <input type="text" class="form-control" id="cargo_desempenhado" placeholder="Informe seu cargo" name="cargo_desempenhado">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="classeFormControlSelect1">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                      <option>entrada</option>
                      <option>hatch pequeno</option>
                      <option>hatch médio</option>
                      <option>sedã médio</option>
                      <option>sedã grande</option>
                      <option>SUV</option>
                      <option>pick-ups</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="classeFormControlSelect1">Filial</label>
                    <select class="form-control" id="filial" name="filial">
                      <option>Filial 1</option>
                      <option>Filial 2</option>
                    </select>
                  </div>
              </div>
            </div>
          <div class="form-group col">
            <button type="submit" class="btn btn-outline-primary">Confirmar</button>
            <button type="button" class="btn btn-outline-danger">Cancelar</button>
          </div>
      </div>
    </div>  
  </form>    
</div>
@endsection