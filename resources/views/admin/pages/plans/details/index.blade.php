@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}" >{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.details.index', $plan->url) }}" class="active">Detalhes</a></li>
    </ol>

    <h1>Detalhes do planos {{ $plan->name }} <a href="{{ route('plans.details.create', $plan->url) }}" class="btn btn-dark" > <i class="fas fa-plus-square"></i> - Novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="120">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{ $detail->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('plans.details.edit', [$plan->url, $detail->id]) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('plans.details.show', [$plan->url, $detail->id]) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>
    </div>
@stop
