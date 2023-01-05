@extends('adminlte::page')

@section('title', 'Detalhes da Permissão')

@section('content_header')
<h1>Detalhes da Permissão <b>{{ $permissions->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome      : </strong> {{ $permissions->name }}
                </li>
                <li>
                    <strong>Descrição : </strong> {{ $permissions->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('permissions.destroy', $permissions->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt">  DELETAR O PERMISSÃO {{ $permissions->name }}</i></button>
            </form>
        </div>
    </div>
@endsection