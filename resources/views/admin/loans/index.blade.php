@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Publicaciones
                <small class="text-muted text-md">Administracion</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('loans.index') }}">loans</a></li>
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
            <div class="card mb-4 shadow-sm card-outline card-primary">
                <div class="card-header ">
                    <h3 class="card-title mt-1">
                        Listado de publicaciones
                    </h3>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                            Crear Publicacion
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered" id="loansTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Extracto</th>
                                <th>Fecha Publicacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                            <tr>
                                <td>{{$loan->id}}</td>
                                <td>{{ Str::limit($loan->title, 50) }}</td>
                                <td>{{ Str::limit($loan->excerpt,50)}}</td>
                                <td>{{$loan->present()->publishedAt()}}</td>
                                <td>
                                    {{-- @can('loans.show') --}}
                                    {{-- <a href="{{ route('loans.edit',$loan) }}" class="btn btn-sm btn-default"
                                        target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a> --}}
                                    {{-- @endcan --}}

                                    {{-- @can('loans.edit') --}}
                                    <a href="{{ route('loans.edit',$loan) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('loans.destroy') --}}
                                    <form  method="POST" action="{{ route('loans.destroy', $loan) }}"
                                        style="display:inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Estas seguro de eliminar esta publicacion?')">
                                        <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    {{-- @endcan --}}
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
@stop

@push('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#loansTable').DataTable();
    });
</script>
@endpush
