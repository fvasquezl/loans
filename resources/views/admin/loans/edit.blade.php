@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                Publicaciones
                <small class="text-muted text-md">Editar publicacion</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Edit</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endpush

@section('content')
@if ($post->documents->count())
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre del Archivo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($post->documents as $key=>$document)
        <tr>
            <td>{{ $key + 1}}</td>
            <td><i class="fas fa-file-pdf fa-1x text-danger"></i> <a href="{{ $document->url }}"
                    target="_blank">{{ $document->title }}</a></td>
            <td class="text-right py-0 align-middle">
                <form method="POST" action="{{ route('admin.documents.destroy',$document) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
@endif

<form method="POST" action="{{ route('admin.posts.update', $post) }}">
    @csrf
    {{method_field('PUT')}}
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label>Titulo de la publicacion</label>
                        <input name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $post->title) }}"
                            placeholder="Inresa aqu&iacute; el t&iacute;tulo de la publicaci&oacute;n">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Extracto de la publicacion</label>
                        <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" id="editor"
                            placeholder="Inresa aqu&iacute; el extracto de la publicaci&oacute;n">
                                  {{ old('excerpt',$post->excerpt) }}</textarea>
                        @error('excerpt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label>Fecha de publicacion:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input name="published_at" type="text"
                                class="form-control float-right @error('published_at') is-invalid @enderror "
                                id="datepicker"
                                value="{{ old('published_at', $post->published_at ? $post->published_at->format('d/m/Y') : null )}}">
                            @error('published_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Categorias</label>
                        <select name="category_id" class="select2 form-control @error('category_id') is-invalid @enderror">
                            <option value="">Selecciona una categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id',$post->category_id)===$category->id ? 'selected':''}}>
                                {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Etiquetas</label>
                        <select name="tags[]" class="select2 form-control @error('tags') is-invalid @enderror"
                            multiple="multiple" data-placeholder="Selecciona una o mas etiquetas" style="width: 100%;">
                            @foreach ($tags as $tag)
                            <option
                                {{collect(old('tags',$post->tags->pluck('id')))->contains($tag->id) ? 'selected':''}}
                                value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Departamentos</label>
                        <select name="departments[]" class="select2 form-control @error('departments') is-invalid @enderror"
                            multiple="multiple" data-placeholder="Selecciona departamentos, (vacio) post publico" style="width: 100%;">
                            @foreach ($departments as $department)
                            <option
                                {{collect(old('departments',$post->departments->pluck('id')))->contains($department->id) ? 'selected':''}}
                                value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('departments')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Documentos</label>
                        <div class="dropzone">

                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Guardar Publicacion</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script>
    $(function () {
            $('#datepicker').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });

            $('#editor').summernote({
                height:'300px'
            });

            $('.select2').select2({
                tags:true
            });

        });

    var myDropzone = new Dropzone('.dropzone',{
        url:"/admin/posts/{{ $post->slug }}/documents",
        // acceptedFiles: 'application/pdf',
        paramName:'document',
        headers:{
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        dictDefaultMessage: 'Arrastra los archivos aqui para subirlos'

    });

    myDropzone.on('error',function(file,res){
        var msg = res.errors.document[0];
        $('.dz-error-message:last > span').text(msg);
    });

    Dropzone.autoDiscover=false;
</script>

@endpush