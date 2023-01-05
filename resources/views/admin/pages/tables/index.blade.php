@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}">Mesas</a></li>
    </ol>

    <h1>Mesas  <a href="{{ route('tables.create') }}" class="btn btn-dark "><i class="fas fa-plus-circle"> Adicionar</i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <form action="{{ route('tables.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filter['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">  
                    <i class="fas fa-search"> Pesquisar</i>
                </button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr> 
                        <th>Identificação</th>
                        <th>Descrição</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                        <tr>
                            <td>{{ $table->identify }}</td>
                            <td>{{ $table->description }}
                            </td>
                            <td style="width=80px;">
                                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-info"><i class="far fa-edit"></i></i></a>
                                <a href="{{ route('tables.show', $table->id) }}" class="btn btn-warning"><i class="far fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="cadrd-footer">
            @if (isset($filters))
                {!! $tables->appends($filters)->links() !!}
            @else
                {!! $tables->links() !!}
            @endif
        </div>
    </div>
@stop 