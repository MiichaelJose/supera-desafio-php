@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.styles.css') }}">
@endsection

@section('nav')
<ul>
    <li><a href="#" onclick="list_maintenance()">listar manutenções</a> </li>
    <li><a href="{{ route('vehicle.view') }}">veiculos</a></li>
    <div class="admin-users">
        @if (session()->has('user'))
            @if (session()->get('user.role') == 'admin')
                <li><a href="{{ route('user.view') }}">clientes</a></li>
            @endif
        @endif
    </div>
</ul>
@endsection

@section('header-content')
<h2>manutenções</h2>

<div class="admin-maintenance">
    @if (session()->has('user'))
        @if (session()->get('user.role') == 'admin')
            <a href="{{ route('maintenance.view') }}" class="link-maintenance">cadastrar manutenção</a>
        @endif
    @endif
</div>

@endsection

@section('content')

<div onload="list_maintenance()"></div>

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
    </div>
</div>

<ul>
    <li> <div id="box" style="background: #FADCD9"></div>analíse</li>
    <li> <div id="box" style="background: #ACEEF3"></div>inicializado</li>
    <li> <div id="box" style="background: #B4F8C8"></div>finalizado</li>
</ul>

<script src="{{ asset('js/home.script.js') }}"></script>
@endsection