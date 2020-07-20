@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<div class="container">

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Lista de Usuarios &nbsp; </h1>
                @can('create user')
                <a href="{{ url('/usuarios/create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Agregar Usuario"><i class="fa fa-plus"></i> Agregar Usuario</a>
                @endcan
                <!--<div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="search" type="search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>-->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                <thead>
                    <tr>
                        
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>        
                    @foreach ($users as $user)
                    <tr>
                        
                        <td>{{ $user->name }} {{ $user->first }} {{ $user->second }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->implode('name', ', ') }}</td>
                        <td>
                          @can('update user')
                            <a href="{{ route('usuarios.edit', $user->id) }}" ><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Editar Usuario"><i class="fas fa-edit"></i></button></a>
                          @endcan  
                          @can('delete user')
                            @include('usuarios.delete', ['user' => $user]) 
                            @endcan                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            
              <div class="card-footer">
                <div class="row">
                    <div class="mx-auto">
                        INSTITUTO TECNOLÓGICO DE TLAXIACO
                    </div>
                </div>  
              </div>

            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

</div>

@endsection