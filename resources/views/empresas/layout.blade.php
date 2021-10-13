<!DOCTYPE html>
<html>
<head>
    <title>Teste pratico</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="pull-left">
    <a class="btn btn-success" href="{{ route('clientes.index') }}"> Lista de clientes</a>
</div>
<div class="pull-left">
    <a class="btn btn-success" href="{{ route('empresas.index') }}"> Lista de empresas</a>
</div>  
<div class="container">
    @yield('content')
</div>
   
</body>
</html>