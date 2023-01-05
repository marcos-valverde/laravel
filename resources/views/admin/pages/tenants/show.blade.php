@extends('adminlte::page')

@section('title', 'Detalhes do Empresa')

@section('content_header')
<h1>Detalhes do Empresa <b>{{ $tenants->title }}</b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <img src="{{ url("storage/{$tenants->logo}") }}" alt="{{ $tenants->name }}" style="max-width: 90px;">
        <ul>
            <li>
                <strong>Plano: </strong> {{ $tenants->plan->name }}
            </li>
            <li>
                <strong>Nome: </strong> {{ $tenants->name }}
            </li>
            <li>
                <strong>URL: </strong> {{ $tenants->url }}
            </li>
            <li>
                <strong>E-mail: </strong> {{ $tenants->email }}
            </li>
            <li>
                <strong>CNPJ: </strong> {{ $tenants->cnpj }}
            </li>
            <li>
                <strong>Ativo: </strong> {{ $tenants->active == 'Y' ? 'SIM' : 'NÃO' }}
            </li>
        </ul>

        <hr>
        <h3>Assinatura</h3>
        <ul>
            <li>
                <strong>Data Assinatura: </strong> {{ $tenants->subscription }}
            </li>
            <li>
                <strong>Data Expira: </strong> {{ $tenants->expires_at }}
            </li>
            <li>
                <strong>Identificador: </strong> {{ $tenants->subscription_id }}
            </li>
            <li>
                <strong>Ativo? </strong> {{ $tenants->subscription_active ? 'SIM' : 'NÃO' }}
            </li>
            <li>
                <strong>Cancelou? </strong> {{ $tenants->subscription_suspended ? 'SIM' : 'NÃO' }}
            </li>
        </ul>
    </div>
</div>
@endsection