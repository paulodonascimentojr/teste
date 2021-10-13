@extends('clientes.layout')

@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{asset('js/cep.js')}}"></script>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar novo cliente</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Voltar</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

    <div class="row"><table><td>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>CEP:</strong>
               <input id="cep" name="cep" type="text" class="form-control" placeholder="CEP" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Número:</strong>
                <input type="text" name="numero" class="form-control" placeholder="Numero">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
        </div></td><td>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CPF/CNPJ:</strong>
                <input type="text" name="registro" class="form-control" placeholder="CPF/CNPJ">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Endereço:</strong>
                <input id="logradouro" type="" name= "endereco" class="form-control" placeholder="Endereço" readonly required/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefone:</strong>
                <input type="text" name="telefone" class="form-control" placeholder="Telefone">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Empresa:</strong>
                <select id="empresa", name="empresa">
                    @foreach ($empresas as $empresa)
                    <option value = "{{ $empresa->nome }}">{{ $empresa->nome }}</option>
                    @endforeach
                </select>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('empresas.create') }}" target= "_blank"> Cadastrar nova empresa</a>
                </div>
            </div>
        </div></td>
        <tr><td>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>RG:</strong>
                    <input type="text" name="rg" class="form-control" placeholder="RG">
                </div>
            </div>
        </td><td>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Data de Nascimento:</strong>
                    <input type="date" name="nascimento" class="form-control" placeholder="Data de Nascimento">
                </div>
            </div>
        </td></tr>
        </table>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
<script type="text/javascript">
		$("#cep").focusout(function(){
			$.ajax({
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				dataType: 'json',
				success: function(resposta){
					$("#logradouro").val(resposta.logradouro+', '+resposta.bairro+', '+resposta.localidade+'-'+resposta.uf);
					$("#numero").focus();
				}
			});
		});
</script>
@endsection
