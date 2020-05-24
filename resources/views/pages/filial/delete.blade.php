@extends('layouts.app')

@section('content')
<div class="container">
  
    <h1 class="title-pg">

        Filial: <b>{{$filial->nome}}</b>
    
    </h1> 
    
    @if(isset($errors) && count($errors) > 0)

    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>

    @endif

    <form method="post" action="{{url('excluir/filial/confirmar', $filial->id)}}">
    @csrf
        <p><b>Nome:</b>{{$filial->nome}}</p>
        <p><b>Inscrição Estadual (IE):</b>{{$filial->ie}}</p>
        <p><b>CNPJ:</b>{{$filial->cnpj}}</p>

    <hr>
    
    <div class="form-group">
        <button type="submit" class="btn btn-danger">Deletar Filial : {{$filial->nome}}</button>
    </div>
    </form>
</div>
@endsection
