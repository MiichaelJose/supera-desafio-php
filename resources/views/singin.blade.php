<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/hatchback.png') }}" type="image/x-icon">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('css/singin.styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.styles.css') }}">
</head>
<body onload="setup()">
    <div class="box-content">
        <h1>Supera Veiculos </h1>
        <h3 style="color: red">
            @if(session('status'))
                {{ session('status') }}
            @endif
        </h3>
        <p>Para acessar o sistema, basta clickar no botão abaixo e preencher os seus dados de acesso no formulário.</p>
        <p>Obs: Os seus dados de acesso é o mesmo que foi passado para um dos nossos representantes no estabelecimento!</p>
        
        <button id="btn-content" class="bt-lg">acessar</button>
    </div>

    
    <form class="box-singin" method="post" action="{{ route('singin') }}">
        @csrf
        <h1>Login</h1>

        <input type="text" name="cpf" placeholder="cpf" class="inp-lg">
        <input type="password" name="password" placeholder="senha" class="inp-lg">

        <button id="btn-login" class="bt-lg">acessar</button>
    </form>
</body>
<script src="{{ asset('js/singin.script.js') }}"></script>
</html>