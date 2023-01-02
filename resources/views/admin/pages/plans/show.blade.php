@extends('adminlte::page')

@section('title', "Detalhe do plano { $plan->name }")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>
    </ol>

    <h1>Detalhes do plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $plan->name }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $plan->url }}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plan->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <div class="card-footer">
                <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> plano {{ $plan->name }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
