@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('estudiantes.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf

    <div class="row"> 
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Actualizar Información del Proyecto</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-danger btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                
                            <!-- ENTRADA PARA EL TITULO -->
                            <div class="form-group">
                                <label>titulo del proyecto:</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-file"></i></div>
                                    </div>
                                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo', $student->titulo) }}" autofocus placeholder="Titulo del proyecto">
                                </div>
                                @error('titulo')
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- ENTRADA PARA EL ASESOR -->
                            <div class="form-group">
                                <label>asesor:</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control @error('asesor') is-invalid @enderror" name="asesor" value="{{ old('asesor', $student->asesor) }}" placeholder="Asesor" >
                                </div>
                                @error('asesor')
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- ENTRADA PARA EL PRIMER INTEGRANTE -->
                            <div class="form-group">
                                <label>primer integrante:</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                    </div>
                                    <input type="text" class="form-control @error('autor') is-invalid @enderror" name="autor" value="{{ old('autor', $student->autor) }}" placeholder="Primer Integrante" >
                                </div>
                                @error('autor')
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- ENTRADA PARA EL SEGUNDO INTEGRANTE -->
                            <div class="form-group">
                                <label>Segundo integrante:</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                    </div>
                                    <input type="text" class="form-control @error('autor2') is-invalid @enderror" name="autor2" value="{{ old('autor2', $student->autor2) }}" placeholder="Segundo Integrante">
                                </div>
                                @error('autor2')
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                
                        </div>
                
                        <div class="col-md-6">

                            <!-- ENTRADA PARA SELECCIONAR LA CARRERA -->
                            <div class="form-group">
                                <label>Selleccionar carrera:</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-graduate"></i></div>
                                    </div>
                                    <select class="custom-select @error('carrera_id') is-invalid @enderror" name="carrera_id" >
                                        <option value="">Seleccionar Carrera</option>
                                            @foreach ($carreras as $car)
                                                @if ($car->id==$student->carrera_id)
                                                    <option value="{{$car->id}}" selected>{{$car->name}}</option>
                                                @else
                                                    <option value="{{$car->id}}"> {{ $car->name }} </option>
                                                @endif
                                            @endforeach
                                        
                                    </select>
                                </div>
                            </div>

                            <!-- ENTRADA PARA SELECCIONAR EL TIPO -->
                            <div class="form-group">
                                <label>Seleccionar Residencia:</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-book-reader"></i></div>
                                    </div>
                                    <select class="custom-select @error('residencia_id') is-invalid @enderror" name="residencia_id" >
                                        <option value="">Seleccionar Residencia</option>
                                        
                                        @foreach ($residencias as $res)
                                            @if ($res->id==$student->residencia_id)
                                            <option value="{{$res->id}}" selected>{{$res->name}}</option>
                                            @else
                                            <option value="{{$res->id}}">{{ $res->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- ENTRADA PARA ELEGIR EL ARCHIVO -->
                            <div class="form-group">
                                <label>Seleccionar archivo:</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-file-pdf"></i></div>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="archivo">
                                        <label class="custom-file-label" for="validatedCustomFile">Archivo 2MB</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <iframe width="100%" height="100%" src="{{ asset($student->archivo) }}"  frameborder="0"></iframe>
                                </div>
                            </div>
                
                        </div>
                
                    </div>
                    
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ url('estudiantes') }}" class="btn btn-info">Regresar</a>
                            <input type="submit" value="Enviar" class="btn btn-success float-right">
                        </div>
                    </div> 
                </div>
                <!-- /.card-footer -->

            </div>
            <!-- /.card -->      
        </div> 
    </div>
</form>

@endsection
