@extends('layouts.app')

@section('content')



@include('coordinadores.create')

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
            <h1 class="card-title">Lista de Coordinadores &nbsp; </h1>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarCoordinador">  
                <i class="fas fa-plus"></i> Registrar
            </button>
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
                    <th>Carrera</th>
                    <th>Nombre Completo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coordinators as $coordinator)
                <tr>
                    <th scope="row"> {{ $coordinator->cuid }}</th>
                    <td scope="row"> {{ $coordinator->name }}</td>
                    <td scope="row"> {{ $coordinator->nombre }}</td>
                    <td>
                        <a href="#" data-target="#modal-edit-{{$coordinator->cuid}}" data-toggle="modal"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                        <a href="" data-target="#modal-delete-{{$coordinator->cuid}}" data-toggle="modal"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>                   
                    </td>
                </tr>
                @include('coordinadores.edit')
                @include('coordinadores.delete', ['coordinator' => $coordinator])
                @endforeach
            </tbody>
            </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <div class="row">
                <div class="mx-auto">
                    Instituto Tecnológico de Tlaxiaco
                </div>
            </div>  
            </div>

        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->

@endsection