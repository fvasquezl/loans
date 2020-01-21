@extends('layouts.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Publicaciones
                    <small class="text-muted text-md">Mostrar publicacion</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
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
            <div class="card mb-4 shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        {{ $post->present()->postTitle() }}
                    </div>

                    <div class="card-body">

                        <p class="card-text">{{ $post->excerpt }}</p>
                        <ul class="list-unstyled">
                         @foreach ($post->documents as $document)
                            <li><i class="far fa-file-pdf"></i> <a href="{{ $document->path }}">{{ $document->title }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
