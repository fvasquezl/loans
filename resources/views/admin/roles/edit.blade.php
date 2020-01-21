@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                Edicion de Roles
                <small class="text-muted text-md">Role</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Edit</li>
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
                <h3>Actualizar Role</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.roles.update',$role) }}">
                    @method('PUT')

                    @include('admin.roles.partials.form')

                    <button class="btn btn-primary btn-block">Actualizar Role</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection