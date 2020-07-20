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
            @can('create carrerauser')
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarCoordinador" data-toggle="tooltip" data-placement="left" title="Nuevo Coordinador">  
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
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>Carrera</th>
                    <th>Nombre Completo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coordinators as $coordinator)
                <tr>
                    <!--  
                    <th scope="row"> $coordinator->cuid</th>-->
                    <td scope="row"> <strong>{{ $coordinator->name }}</strong></td>
                    <td scope="row"> {{ $coordinator->nombre }}</td>
                    <td scope="row"> {{ $coordinator->datestart }} </td>
                    <td scope="row"> {{ $coordinator->dateend }} </td>
                    <td>
                        @can('update carrerauser')
                            @include('coordinadores.edit')
                        @endcan
                        @can('delete carrerauser')
                            @include('coordinadores.delete', ['coordinator' => $coordinator])
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