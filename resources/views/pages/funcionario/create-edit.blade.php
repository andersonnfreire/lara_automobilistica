@extends('layouts.app')

@section('content')
<div class="container">
    <form>
        <div class="card border-primary mb-3" style="max-width: auto;">
            <div class="card-header text-white bg-primary">
                <h1 class="title-pg">
                    Cadastrar Funcionario
                </h1>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="cpf">CPF</label>
                      <input type="cpf" class="form-control" id="cpf" name="cpf">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="confirm-password">Confirm Password</label>
                      <input type="confirm-password" class="form-control" id="confirm-password" name="confirm-password">
                    </div>
                </div>
                <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="inputAddress">Sexo</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="M" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        Masculino
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="F">
                      <label class="form-check-label" for="exampleRadios2">
                        Feminino
                      </label>
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                  </div>
                  
              </div>
              <div class="form-row">

                <div class="form-group col-md-4">
                  <label for="inputAddress">Situação</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="situacao" id="sexo1" value="true" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Ativo
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="situacao" id="sexo2" value="false">
                    <label class="form-check-label" for="exampleRadios2">
                      Inativo
                    </label>
                  </div>
                </div>

                <div class="form-group col-md-5">
                  <label for="cargo_desempenhado">Cargo Desempenhado</label>
                  <input type="text" class="form-control" id="cargo_desempenhado" placeholder="Informe seu cargo" name="cargo_desempenhado">
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
                      <label for="pais">Pais</label>
                      <input type="text" class="form-control" id="pais" name="pais">
                    </div>
                  </div>
                </div>
              </div> 
            </div>
           <div class="form-group col">
            <button type="submit" class="btn btn-outline-primary">Confirmar</button>
            <button type="button" class="btn btn-outline-danger">Cancelar</button>
            </div>
        </div>
        
    </form>    
</div>
@endsection