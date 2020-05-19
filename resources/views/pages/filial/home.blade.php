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
                    <th>Descrição</th>
                    <th width='100px'>Ações</th>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td>Valor</td>
                    <td>
                        <a href="" class="actions actions-over edit"> 
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="" class="actions actions-over delete"> 
                            <i class="fas fa-low-vision"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    {{-- {!! $products->links() !!} --}}
</div>
@endsection
