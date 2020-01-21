@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                Categorias
                <small class="text-muted text-md">Administracion</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 my-3">
            @include('partials.show_messages')

            <div class="card mb-4 shadow-sm card-outline card-success">
                <div class="card-header ">
                    <h3 class="card-title mt-1">
                        Listado de Categorias
                    </h3>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
                            <i class="fa fa-plus"></i>
                            Crear Categoria
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover" id="categoriesTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Fecha de creacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>

                                <td>
                                    @can('admin.categories.show')
                                    <a href="{{ route('admin.categories.show',$category->id)}}"
                                        class="btn btn-sm btn-default">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endcan

                                    @can('admin.categories.edit')
                                    <a href="{{ route('admin.categories.edit',$category->id) }}"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan

                                    @can('admin.categories.destroy')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                        style="display:inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.categories.create')

@stop

@push('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#categoriesTable').DataTable();
    });
</script>
@endpush
