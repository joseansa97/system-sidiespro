<!--=====================================
MODAL AGREGAR COORDINADOR A UNA CARRERA
======================================-->
<form action="{{ route('coordinadores.update', $coordinator->cuid) }}" method="POST" style="display:inline-block;">
@method('PUT')
@csrf

    <div id="modal-edit-{{$coordinator->cuid}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-edit"></i> Actualizar Coordinador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR LA CARRERA -->
                        <div class="col-auto">
                            <label for="carrera">Carrera: </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-graduate"></i></div>
                                </div>
                                <select class="custom-select @error('carrera') is-invalid @enderror" name="carrera" >
                                        <option value="">Seleccionar Carrera</option>
                                    @foreach ($carreras as $value)
                                        @if ($value->id == $coordinator->cid)
                                            <option value="{{ $value->id }}" selected>{{ $value->carrera }}</option>
                                        @else
                                            <option value="{{ $value->id }}" {{ old('carrera', $value->carrera) == $value->id ? 'selected' : '' }}>{{ $value->carrera }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @error('carrera')
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL COORDINADOR -->
                        <div class="col-auto">
                            <label for="coordinador">Coordinador: </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-book-reader"></i></div>
                                </div>
                                <select class="custom-select @error('coordinador') is-invalid @enderror" name="coordinador" >
                                    <option value="">Seleccionar Coordinador</option>
                                    @foreach ($users as $value)
                                        @if ($value->id == $coordinator->uid)
                                            <option value="{{ $value->id }}" selected>{{ $value->coordinador }}</option>
                                        @else
                                            <option value="{{ $value->id }}" {{ old('coordinador', $value->coordinador) == $value->id ? 'selected' : '' }}>{{ $value->coordinador }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </div>
                            @error('coordinador')
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- ENTRADA PARA LA FECHA DE INICIO -->
                        <div class="col-auto">
                            <label for="date">Fecha de Inicio: </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-tie"></i>
                                </span>
                                </div>
                                <input type="date" class="form-control float-right" name="date">
                            </div> <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        
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