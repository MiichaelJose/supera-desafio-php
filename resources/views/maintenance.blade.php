@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('css/maintenance.styles.css') }}">

@endsection

@section('nav')
<ul>
    <li><a href="{{ route('home') }}"><- voltar</a> </li>
    <li><a onclick="modalListVehicle()">lista</a></li>
    <li><a href="{{ route('maintenance.view') }}">cadastrar</a></li>
</ul>
@endsection
         
@section('header-content')

<h2>manutenções</h2>
<h3>
    @if(session('status'))
        {{ session('status') }}
    @endif
</h3>

@endsection

@section('content')


<form class='form post-maintenance' method="POST" action="{{ route('maintenance.store') }}">
    @csrf
    @method('POST')
    <h4>veiculo</h4>
    <select name="vehicle_id" id="select-vehicles">
    </select>
    
    <h4>descrição</h4>
    <input name="description" type="text">

    <button type="submit" >cadastrar</button>
</form>


<form class='form put-maintenance' method="POST">
    <div class="card-put">

    </div>
    
    <div class='inputs-put'>
        @csrf
        @method('PUT')
        <h4>data de analise</h4>
        <input name="analysis_date" type="date">
        <h4>data de inicio</h4>
        <input name="start_date" type="date">
        <h4>data de finalização</h4>
        <input name="final_date" type="date">

        <button type="submit" >alterar</button>
    </div>
</form>

<form class='form delete-maintenance' method="POST">
    <div class="card-delete">

    </div>
    <div class='info-delete'>
        @csrf
        @method('DELETE')
        <p>deseja remover essa manutenção?</p>
        <button type="submit" >remover</button>
    </div>
</form>

<form class='form get-maintenance' method="POST">
    
</form>


@endsection

@section('info')

<div class="card maintenance">
    <img src="https://quatrorodas.abril.com.br/wp-content/uploads/2019/11/hr_3955.cr2_.jpg?quality=70&strip=info" alt="">
    <div class="card__texts">
        <div>
            <p>Chevrolet</p>
            <p>Onix</p>
            <p>2023</p>
        </div>
        <div>
            <p>manutenção:</p>
            <p>gerada: 24/10/2022</p>
            <p>analise: 24/10/2022</p>
            <p>iniciada: ---</p>
            <p>finalizada: ---</p>
        </div>
        <div class="buttons">
            <button style="background-color: #FADCD9" type="button">alterar</button>
            <button style="background-color: #F8AFA6" type="button">deletar</button>
        </div>
    </div>
</div>
   
<script src="{{ asset('js/maintenance.script.js') }}"></script>
@endsection