@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('css/vehicle.styles.css') }}">

@endsection

@section('nav')
<ul>
    <li><a href="{{ route('home') }}"><- voltar</a> </li>
    <li><a onclick="modal_list_users()">lista</a></li>
    <li><a href="{{ route('vehicle.view') }}">cadastrar</a></li>
</ul>
@endsection

@section('header-content')

<h2>vehicles</h2>
<h3>
    @if(session('status'))
        {{ session('status') }}
    @endif
</h3>

@endsection

@section('content')


<form class='form post-vehicle' method="POST" action="{{ route('vehicle.store') }}">
    @csrf
    @method('POST')
    <h4>cliente</h4>
    <select name="user_id" id="select-users">
    </select>

    <h4>veiculo</h4>
    <input name="vehicle" type="text">
    
    <h4>marca</h4>
    <input name="brand" type="text">

    <h4>modelo</h4>
    <input name="model" type="text">

    <h4>versão</h4>
    <input name="version" type="text">

    <button type="submit" >cadastrar</button>
</form>

<form class='form get-vehicle' method="POST">
    
</form>

<form class='form put-vehicle' method="POST">
    <div class="card-put">

    </div>
    <div class='inputs-put'>
        @csrf
        @method('PUT')
        <h4>cliente</h4>
        <select name="user_id" id="select-users-put">
        </select>

        <h4>veiculo</h4>
        <input name="vehicle" type="text">
        
        <h4>marca</h4>
        <input name="brand" type="text">

        <h4>modelo</h4>
        <input name="model" type="text">

        <h4>versão</h4>
        <input name="version" type="text">
        <button type="submit" >alterar</button>
    </div>
</form>

<form class='form delete-vehicle' method="POST">
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
<div class="card vehicle">
    <img src="https://quatrorodas.abril.com.br/wp-content/uploads/2019/11/hr_3955.cr2_.jpg?quality=70&strip=info" alt="">
    <div class="card__texts">
        <div>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
        </div>
        <div>
            <p></p>
            <p></p>
        </div>
        <div class="buttons">
            <button style="background-color: #FADCD9" type="button">alterar</button>
            <button style="background-color: #F8AFA6" type="button">deletar</button>
        </div>
    </div>
</div>

<script src="{{ asset('js/vehicle.script.js') }}"></script>
@endsection