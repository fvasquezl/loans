@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                Departamentos
                <small class="text-muted text-md">Informacion del departamento</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}">Departamentos</a></li>
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
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/departamento.png')}}"
                            alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $department->name }}</h3>

                    <p class="text-muted text-center">{{ $department->display_name }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <i class="fas fa-users"></i> <b>Empleados</b> <a class="float-right">{{ $department->users()->count() }}</a>
                        </li>
                    </ul>

                    <a href="{{ route('admin.departments.edit',$department)}}" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.card -->
         <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-users"></i> Empleados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @forelse ($department->users as $user)
                    <i class="fas fa-user"></i><a href="{{ route('admin.users.show',$user) }}" target="_blank">
                         {{ $user->name }}
                    </a>
                    <br>
                    <small class="text-muted">{{ $user->getRoleDisplayName() }}</small>
                    <br>
                    <small class="text-muted">{{ $user->created_at->format('M d Y')}}</small>
                    @unless ($loop->last)
                    <hr>
                    @endunless
                    @empty
                    <small class="text-muted">No tiene ninguna Empleado</small>
                    @endforelse
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
     {{--   <div class="col-md-3">
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
        </div> --}}

    </div>
</div>
@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Departamento</div>

                <div class="card-body">
                    <p><strong>Siglas: </strong>{{ $department->name }}</p>
                    <p><strong>Nombre: </strong>{{ $department->display_name }}</p>
                    <p><strong>Descripcion: </strong>{{ $department->description }}</p>
                    <hr>
                    <h3>Integrantes</h3>
                    <p>{{ $department->present()->usersByDepartment()}}</p>
                    {{-- <table>
                        <tr>
                        <th>Usuario</th>
                        <th>Rol</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                            <td>{{$user->name}}</td>

                    <td>{{$user->roles()->role}}</td>

                    </tr>
                    @endforeach
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}