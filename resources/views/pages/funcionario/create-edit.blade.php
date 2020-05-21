@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card border-primary mb-3" style="max-width: auto;">
      <div class="card-header text-white bg-primary">
          <h1 class="title-pg">
              Cadastrar Funcionário
          </h1>
      </div>
     
      <form method="POST" class="form" action="{{ route("cadastrar")}}" >
        @csrf
        <div class="card-body" id="form">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="nome">Nome</label>
              <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
              @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-md-2">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>                
              @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-md-2">
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-2">
              <label for="confirm-password">Confirm Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

            </div>
          </div>
            <div class="form-row">

              <div class="form-group col-md-4">
                <label for="sexo">Sexo</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="M" checked>
                  <label class="form-check-label" for="sexo">
                    Masculino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="F">
                  <label class="form-check-label" for="sexo">
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
                <input class="form-check-input" type="radio" name="situacao" id="situacao1" value="true" checked>
                <label class="form-check-label" for="situacao">
                  Ativo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="situacao" id="situacao2" value="false">
                <label class="form-check-label" for="situacao">
                  Inativo
                </label>
              </div>
            </div>

            <div class="form-group col-md-3">
              <label for="cargo_desempenhado">Cargo Desempenhado</label>
              <input type="text" class="form-control  @error('cargo_desempenhado') is-invalid @enderror" id="cargo_desempenhado" placeholder="Informe seu cargo" name="cargo_desempenhado">
              @error('cargo_desempenhado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            
            </div>
            <div class="form-group col-md-3">
              <label for="filial">Filial</label>
              <select class="form-control" id="filial" name="filial">
                <option value="">Escolha a filial</option>
                @foreach ($filials as $filial)
                  <option value="{{$filial->id}}">{{$filial->nome}}</option>
                @endforeach
              </select>
              @error('filial')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
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
                  <input class="form-control py-2 col  @error('cargo_desempenhado') is-invalid @enderror" type="search" value="" name="cep" id="example-search-input">
                  <span class="input-group-append">
                    <button class="btn btn-outline-secondary bg-primary" type="button">
                        <i class="fa fa-search "></i>
                    </button>
                  </span>
                  @error('cep')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4 ">
                <label for="endereco">Logradouro</label>
                <input type="text" class="form-control @error('cargo_desempenhado') is-invalid @enderror" id="logradouro" name="logradouro">
              
                @error('logradouro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group col-md-1">
                <label for="endereco">Número</label>
                <input type="number" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero">
              
                @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              
              </div>
              <div class="form-group col-md-3">
                <label for="endereco">Complemento</label>
                <input type="text" class="form-control @error('complemento') is-invalid @enderror" id="complemento" name="complemento">
              
                @error('complemento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="endereco">Bairro</label>
                <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro" name="bairro">
              
                @error('bairro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

              </div>
              <div class="form-group col-md-3">
                <label for="endereco">Cidade</label>
                <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade" name="cidade">
              
                @error('cidade')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group col-md-1">
                <label for="endereco">Estado</label>
                <input type="text" class="form-control @error('uf') is-invalid @enderror" id="uf" name="uf">
              
                @error('uf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group col-md-1">
                <label for="endereco">Pais</label>
                <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais">

                @error('pais')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

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