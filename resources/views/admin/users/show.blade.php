@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                Perfil de Usuario
                <small class="text-muted text-md">Informacion del usuario</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/user1.png')}}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">{{ $user->roles->first()->name }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <i class="fas fa-envelope"></i> <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-calendar-alt"></i> <b>Usuario desde:</b> <a
                                class="float-right">{{ $user->present()->userCreatedat() }}</a>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-clone"></i> <b>Publicaciones creadas</b> <a
                                class="float-right">{{ $user->present()->userPostCount() }}</a>
                        </li>
                    </ul>

                    <a href="{{ route('admin.users.edit',$user)}}" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.card -->
        <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Publicaciones</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @forelse ($user->posts as $post)
                    <a href="{{ route('posts.show',$post) }}" target="_blank">
                        <strong>{{ $post->title }}</strong>
                    </a>
                    <br>
                    <small class="text-muted">Publicado el {{ $post->present()->publishedAt() }}</small>
                    <p class="text-muted">{{ $post->excerpt}}</p>
                    @unless ($loop->last)
                    <hr>
                    @endunless
                    @empty
                    <small class="text-muted">No tiene ninguna publicacion</small>
                    @endforelse
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Roles</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @forelse ($user->roles as $role)
                    <strong>{{ $role->name }}</strong>
                    @if($role->permissions->count())
                    <br>
                    <small class="text-muted">
                        Permisos: {{ $role->permissions->pluck('name')->implode(', ')}}
                    </small>
                    @endif
                    @unless ($loop->last)
                    <hr>
                    @endunless
                    @empty
                    <small class="text-muted">No tiene ningun rol asociado</small>
                    @endforelse
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Permisos adicionales</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @forelse ($user->permissions as $permission)
                    <strong>{{ $permission->name }}</strong>
                    @unless ($loop->last)
                    <hr>
                    @endunless
                    @empty
                    <small class="text-muted">No tiene permisos adicionales</small>

                    @endforelse
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
</div>
@endsection