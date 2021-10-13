@extends('clientes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listagem de clientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clientes.create') }}"> Cadastrar novo cliente</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('empresas.create') }}"> Cadastrar nova empresa</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('clientes.search')}}" method="get" class="form form-inline">

        <div class=row style="text-align:center;">
            <div class= "input-field col s4">
                <label for="buscar">Nome</label>
                <input name="nome" type="text" class="validate">
            </div>
            <div class= "input-field col s4">
                <label for="buscar">CPF/CNPJ</label>
                <input name="registro" type="text" class="validate">
            </div>
            <div class= "input-field col s4">
                <label for="buscar">Data</label>
                <input name="data" type="date" class="validate">
            </div>
            <div class="input-field col s3">
                <button type="submit">Pesquisar</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <tr>
            <th></th>
            <th>Nome</th>
            <th>CPF/CNPJ</th>
            <th>Data de Cadastro</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->registro }}</td>
            <td>{{$cliente->created_at->format('d/m/Y')}}</td>
            <td>
                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('clientes.show',$cliente->id) }}">Ver</a>

                    <a class="btn btn-primary" href="{{ route('clientes.edit',$cliente->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $clientes->links() !!}

@endsection
