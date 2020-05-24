@extends('layouts.app')

@section('content')
<div class="container">
  
    <h1 class="title-pg">

        Funcionario: <b>{{$funcionario->nome}}</b>
    
    </h1> 
    
    @if(isset($errors) && count($errors) > 0)

    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>

    @endif

    <form method="post" action="{{url('excluir/funcionario/confirmar', $funcionario->id)}}">
    @csrf
        <p><b>Nome:</b>{{$funcionario->nome}}</p>
        <p><b>CPF:</b>{{$funcionario->cpf}}</p>
        <p><b>Filial:</b>{{$funcionario->filial->nome}}</p>

    <hr>
    
    <div class="form-group">
        <button type="submit" class="btn btn-danger">Deletar Funcionario : {{$funcionario->nome}}</button>
        <a type="submit" class="btn btn-danger btn-close" href="{{ route('home') }}">Cancel</a>
    </div>
    </form>
</div>
@endsection
