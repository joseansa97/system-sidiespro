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
                    <option value="{{ $value->id }}" {{ old('carrera', $value->carrera) == $value->id ? 'selected' : '' }}>{{ $value->carrera }}</option>
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
                        <option value="{{ $value->id }}" {{ old('coordinador', $value->coordinador) == $value->id ? 'selected' : '' }}>{{ $value->coordinador }}</option>
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