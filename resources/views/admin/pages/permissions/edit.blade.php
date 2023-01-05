@extends('adminlte::page')

@section('title', "Editar o Permissão {$permissions->name}")

@section('content_header')
<h1>Editar o Permissão {{ $permissions->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permissions->id) }}" class="form" method="POST">
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection