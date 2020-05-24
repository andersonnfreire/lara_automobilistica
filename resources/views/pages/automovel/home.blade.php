@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card border-primary mb-3" style="max-width: auto;">
        <div class="card-header text-white bg-primary">
            <h1 class="title-pg">
                Listagem dos Automóveis
            </h1>
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
                <tr>
                    <th>Nome</th>
                    <th>Número de Chassi</th>
                    <th>Filial</th>
                    <th width='100px'>Ações</th>
                </tr>
                @foreach ($automoveis as $automovel)
                <tr>
                    <td>{{$automovel->nome}}</td>
                    <td>{{$automovel->numero_chassi}}</td>
                    <td>{{$automovel->filial->nome}}</td>
                    <td>
                        <a href="{{url("consultar/automovel/$automovel->id")}}" class="actions actions-over edit"> 
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="" class="actions actions-over delete"> 
                            <i class="fas fa-low-vision"></i>
                        </a>
                    </td>               
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{-- {!! $products->links() !!} --}}
</div>
@endsection
