@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card border-primary mb-3" style="max-width: auto;">
        <div class="card-header text-white bg-primary">
            <h1 class="title-pg">
                Listagem das Filiais
            </h1>
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
                <tr>
                    <th>Nome</th>
                    <th>Inscrição Estadual (IE)</th>
                    <th>CNPJ</th>
                    <th width='100px'>Ações</th>
                </tr>
                @foreach ($filiais as $filial)
                <tr>
                    <td>{{$filial->nome}}</td>
                    <td>{{$filial->ie}}</td>
                    <td>{{$filial->cnpj}}</td>
                    <td>
                        <a href="" class="actions actions-over edit"> 
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
