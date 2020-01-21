@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Categorias</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category</div>

                <div class="card-body">
                    <p><strong>Siglas: </strong>{{ $category->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection