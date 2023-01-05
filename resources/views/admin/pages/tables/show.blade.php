@extends('adminlte::page')

@section('title', 'Detalhes da Mesa')

@section('content_header')
<h1>Detalhes da Mesa <b>{{ $tables->identify }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Identificador  da Mesa: </strong> {{ $tables->identify }}
                </li>
                <li>
                    <strong>Descrição : </strong> {{ $tables->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('tables.destroy', $tables->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt">  DELETAR A MESA {{ $tables->name }}</i></button>
            </form>
        </div>
    </div>
@endsection