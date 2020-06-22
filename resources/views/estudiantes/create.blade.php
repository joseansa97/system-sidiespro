<form action="{{ url('estudiantes') }}" method="POST" enctype="multipart/form-data">
@csrf

    <!--=====================================
    MODAL AGREGAR Estudiante
    ======================================-->

    <div id="modalAgregarEstudiante" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        <!--<form role="form" method="post" enctype="multipart/form-data">
        </form>-->
            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->
        <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-plus"></i> Registrar Proyecto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!--=====================================
            CUERPO DEL MODAL
            ======================================-->
            <div class="modal-body">

            <div class="box-body">

                <!-- ENTRADA PARA EL TITULO -->
                <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-file"></i></div>
                        </div>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" autofocus placeholder="Titulo del proyecto">
                    </div>
                    @error('titulo')
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ENTRADA PARA EL ASESOR -->
                <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user-alt"></i></div>
                        </div>
                        <input type="text" class="form-control @error('asesor') is-invalid @enderror" name="asesor" value="{{ old('asesor') }}" placeholder="Asesor" >
                    </div>
                    @error('asesor')
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ENTRADA PARA EL PRIMER INTEGRANTE -->
                <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                        </div>
                        <input type="text" class="form-control @error('autor') is-invalid @enderror" name="autor" value="{{ old('autor') }}" placeholder="Primer Integrante" >
                    </div>
                    @error('autor')
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ENTRADA PARA EL SEGUNDO INTEGRANTE -->
                <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                        </div>
                        <input type="text" class="form-control @error('autor2') is-invalid @enderror" name="autor2" value="{{ old('autor2') }}" placeholder="Segundo Integrante">
                    </div>
                    @error('autor2')
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ENTRADA PARA SELECCIONAR LA CARRERA -->
                <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user-graduate"></i></div>
                        </div>
                        <select class="custom-select @error('carrera_id') is-invalid @enderror" name="carrera_id" >
                                <option value="">Seleccionar Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}" {{ old('carrera_id', $carrera->name) == $carrera->id ? 'selected' : '' }}>{{ $carrera->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    @error('carrera_id')
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ENTRADA PARA SELECCIONAR EL TIPO -->
                <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-book-reader"></i></div>
                        </div>
                        <select class="custom-select @error('residencia_id') is-invalid @enderror" name="residencia_id" >
                            <option value="">Seleccionar Residencia</option>
                            @foreach ($residencias as $residencia)
                                <option value="{{ $residencia->id }}" {{ old('residencia_id', $residencia->name) == $residencia->id ? 'selected' : '' }}>{{ $residencia->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('residencia_id')
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ENTRADA PARA ELEGIR EL ARCHIVO -->
                <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-file-pdf"></i></div>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('archivo') is-invalid @enderror" name="archivo" value="{{ old('archivo') }}">
                            <label class="custom-file-label" for="validatedCustomFile">Elegir Archivo</label>
                        </div>
                    </div>
                    @error('archivo')
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            </div>

        <!--=====================================
            PIE DEL MODAL
            ======================================-->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
            <button type="reset" class="btn btn-warning">Limpiar</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Enviar</button>
            </div>
        

        </div>
    </div>
    </div>

</form>