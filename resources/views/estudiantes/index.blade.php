@extends('layouts.app')

@section('content')

@include('estudiantes.create')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header">
          <h6 class="card-title">Lista de Proyectos &nbsp; </h6>
          @can('create student')
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarEstudiante" data-toggle="tooltip" data-placement="bottom" title="Nuevo Proyecto">  
            <i class="fas fa-plus"></i> Registrar
          </button>
          @endcan
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
        <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Asesor</th>
            <th scope="col">Primer Integrante</th>
            <th scope="col">Segundo Integrante</th>
            <th scope="col">Carrera</th>
            <th scope="col">Tipo</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
          <tr>
              <td><strong>{{ $student->titulo }}</strong></td>
              <td>{{ $student->asesor }}</td>
              <td>{{ $student->autor }}</td>
              <td>{{ $student->autor2 }}</td>
              <td>{{ $student->carrera_id }}</td>
              <td>{{ $student->residencia_id }}</td>
              <td>
                <a href="#" data-target="#modal-archivo-{{$student->id}}" data-toggle="modal"><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Detalle del Proyecto"><i class="fas fa-eye"></i></button></a>
                @can('update student')
                <a href="{{ route('estudiantes.edit', $student->id) }}" ><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Editar Proyecto"><i class="fas fa-edit"></i></button></a>
                @endcan
                @can('delete student')
                @include('estudiantes.delete', ['student' => $student])
                @endcan
              </td>
          </tr>
          @include('estudiantes.file')
          @endforeach
        </tbody>
      </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <div class="row">
            <div class="mx-auto">
              @if(Request::get('search'))
                {{ $students->appends('search', Request::get('search'))->links() }}<!-- se le agrega con appends una variable llamada search con el valor que viene en ella-->
            @else
                {{ $students->links() }}
            @endif
            </div>
          </div>
        </div>

      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->


@endsection