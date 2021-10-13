@extends('empresas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Empresa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('empresas.index') }}"> Voltar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ocorreu algum erro ao atualizar.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('empresas.update',$empresa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" value="{{ $empresa->nome }}" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Estado:</strong>
                <select id="uf", name="uf" value="{{ $empresa->uf }}" >
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
                
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>CNPJ:</strong>
                <input type="text" name="cnpj" value="{{ $empresa->cnpj }}"  class="form-control" placeholder="CNPJ">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 text-center">
              <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>

    </form>
