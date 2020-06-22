@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Lista de Usuarios &nbsp; </h1>
                
                <a href="{{ url('/usuarios/create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Agregar Usuario</a>
               
                <div class="card-tools">
                    <form>
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="search" type="search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
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
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }} {{ $user->first }} {{ $user->second }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->implode('name', ', ') }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $user->id) }}" ><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                            
                            @include('usuarios.delete', ['user' => $user])                            
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
                        paginacion
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