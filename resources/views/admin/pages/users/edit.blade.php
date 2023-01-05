@extends('adminlte::page')

@section('title', "Editar o usuário {$users->name}")

@section('content_header')
<h1>Editar o usuário {{ $users->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $users->id) }}" class="form" method="POST">
                @csrf 
                @method('PUT')
                
                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection