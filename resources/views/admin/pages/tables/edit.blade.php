@extends('adminlte::page')

@section('title', "Editar a mesa {$tables->identify}")

@section('content_header')
<h1>Editar a mesa {{ $tables->identify }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tables.update', $tables->id) }}" class="form" method="POST">
                @csrf 
                @method('PUT')
                
                @include('admin.pages.tables._partials.form')
            </form>
        </div>
    </div>
@endsection