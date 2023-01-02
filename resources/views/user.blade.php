@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user.styles.css') }}">

@endsection

@section('nav')
<ul>
    <li><a href="{{ route('home') }}"><- voltar</a> </li>
    <li><a onclick="modalListUsers()">lista</a></li>
    <li><a href="{{ route('user.view') }}">cadastrar</a></li>
</ul>
@endsection

@section('header-content')

<h2>clientes</h2>
<h3>
    @if(session('status'))
        {{ session('status') }}
    @endif
</h3>

@endsection

@section('content')


<form class='form post-user' method="POST" action="{{ route('user.store') }}">
    @csrf
    @method('POST')
    <h4>nome</h4>
    <input name="name" type="text">
    
    <h4>cpf</h4>
    <input name="cpf" type="text">

    <h4>senha</h4>
    <input name="password" type="text">

    <button type="submit" >cadastrar</button>
</form>


<form class='form get-user' method="POST">

    
</form>

<form class='form put-user' method="POST">
    <div class="card-put">

    </div>
</form>

<form class='form delete-user' method="POST">
    <div class="card-delete">

    </div>
    <div class='info-delete'>
        @csrf
        @method('DELETE')
        <p>deseja remover esse usuário?</p>
        <button type="submit" >remover</button>
    </div>
</form>



@endsection

@section('info')
<div class="card user">
    <img src="{{ asset('img/user.png') }}" alt="">
    <div>
        <p>Michael</p>
        <p>015.145.214-05</p>
    </div>

    <div class="buttons">
        <button style="background-color: #FADCD9" type="button">alterar</button>
        <button style="background-color: #F8AFA6" type="button">deletar</button>
    </div>
</div>
   
<script src="{{ asset('js/user.script.js') }}"></script>
@endsection