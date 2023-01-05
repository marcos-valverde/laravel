@extends('adminlte::page')

@section('title', "Editar o empresa {$tenants->name}")

@section('content_header')
<h1>Editar o empresa {{ $tenants->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.update', $tenants->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                
                @include('admin.pages.tenants._partials.form')
            </form>
        </div>
    </div>
@endsection