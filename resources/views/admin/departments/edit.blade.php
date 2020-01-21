@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Departamentos
                <small class="text-muted text-md">Administracion</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}">Departamentos</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop 
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Edicion de departamentos</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.departments.update',$department) }}">
                    @method('PUT')

                     @include('admin.departments.partials.form')

                    <button class="btn btn-primary btn-block">Actualizar Departamento</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection