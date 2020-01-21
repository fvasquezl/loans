@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                Categorias
                <small class="text-muted text-md">Editar categoria</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
 @include('partials.show_messages')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Formulario de edicion de categorias</h5>
                </div>
                <form method="POST" action="{{ route('admin.categories.update',$category) }}">
                    @csrf @method('PUT')
                    <div class="card-body">
                        @include('admin.categories.partials.form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Actualizar categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection