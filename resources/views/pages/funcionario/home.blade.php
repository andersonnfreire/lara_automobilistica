@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card border-primary mb-3" style="max-width: auto;">
        <div class="card-header text-white bg-primary">
            <h1 class="title-pg">
                Listagem de Funcionarios
            </h1>
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Filial</th>
                    <th width='100px'>Ações</th>
                </tr>
                @foreach($filiais as  $funcionario)
                <tr>
                    <td>{{ $funcionario->id}}</td>
                    <td>{{ $funcionario->nome}}</td>
                    <td>{{ $funcionario->filial->nome}}</td>
                
                    <td>
                        <a href="{{url("consultar/funcionario/$funcionario->id")}}" class="actions actions-over edit"> 
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{url("excluir/funcionario/$funcionario->id")}}" class="actions actions-over delete"> 
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
