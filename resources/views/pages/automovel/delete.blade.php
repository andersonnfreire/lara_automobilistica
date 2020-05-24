@extends('layouts.app')

@section('content')
<div class="container">
  
    <h1 class="title-pg">

        Automóvel: <b>{{$automovel->nome}}</b>
    
    </h1> 
    
    @if(isset($errors) && count($errors) > 0)

    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>

    @endif

    <form method="post" action="{{url('excluir/automovel/confirmar', $automovel->id)}}">
    @csrf
        <p><b>Nome:</b>{{$automovel->nome}}</p>
        <p><b>Numero de Chassi :</b>{{$automovel->numero_chassi}}</p>
        <p><b>Filial:</b>{{$automovel->filial->nome}}</p>

    <hr>
    
    <div class="form-group">
        <button type="submit" class="btn btn-danger">Deletar Automovel : {{$automovel->nome}}</button>
        <a type="submit" class="btn btn-danger btn-close" href="{{ route('home') }}">Cancel</a>
    </div>
    </form>
</div>
@endsection
