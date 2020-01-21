@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                Usuarios
                <small class="text-muted text-md">Crear usuario</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Registro de Usuarios</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name') }}"
                            class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Roles</label>
                            @include('admin.roles.partials.checkboxes')
                        </div>

                        <div class="form-group col-md-4">
                            <label>Permisos</label>
                            @include('admin.permissions.partials.checkboxes',['model'=> $user])
                        </div>
                        <div class="form-group col-md-4">
                            <label>Departamentos</label>
                            @include('admin.departments.partials.checkboxes')
                        </div>
                    </div>

                    <span class="help-block">La contrasena sera generada y enviada al nuevo usuario via email</span>

                    <button class="btn btn-primary btn-block">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection