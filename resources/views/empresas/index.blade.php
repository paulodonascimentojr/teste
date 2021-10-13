@extends('empresas.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listagem de empresas cadastradas</h2>
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
   
    <table class="table table-bordered">
        <tr>
            <th></th>
            <th>UF</th>
            <th>Nome</th>
            <th>CNPJ</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($empresas as $empresa)
        <tr>
            <td>{{ $empresa->id  }}</td>
            <td>{{ $empresa->uf }}</td>
            <td>{{ $empresa->nome }}</td>
            <td>{{ $empresa->cnpj }}</td>
            <td>
                <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('empresas.show',$empresa->id) }}">Ver</a>
    
                    <a class="btn btn-primary" href="{{ route('empresas.edit',$empresa->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $empresas->links() !!}
      
@endsection