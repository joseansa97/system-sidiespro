<div class="card-body">
    <div class="row">
        <div class="col-md-6">

            <!-- Entrada de name -->
            <div class="form-group">
                <label>Nombre:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user-alt"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control float-right @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autofocus placeholder="Ingresar nombre">
                </div> <!-- /.input group -->
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.form group -->

            <!-- Entrada de first -->
            <div class="form-group">
                <label>Apellido Paterno:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user-tie"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control float-right @error('first') is-invalid @enderror" name="first" value="{{ old('first', $user->first) }}" placeholder="Ingresar apellido paterno">
                </div> <!-- /.input group -->
                @error('first')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.form group -->

            <!-- Entrada de second -->
            <div class="form-group">
                <label>Apellido Materno:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user-tie"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control float-right @error('second') is-invalid @enderror" name="second" value="{{ old('second', $user->second) }}" placeholder="Ingresar apellido materno">
                </div> <!-- /.input group -->
                @error('second')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
            </div>
            <!-- /.form group -->

            <!-- Entrada de second -->
            <div class="form-group">
                <label>Telefono:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-phone"></i>
                    </span>
                    </div>
                    <input type="number" class="form-control float-right @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Ingresar número de Telefono">
                </div> <!-- /.input group -->
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.form group -->

        </div>

        <div class="col-md-6">

            <!-- Entrada de phone -->
            <div class="form-group">
                <label>Role de usuario:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user-graduate"></i></div>
                    </div>
                    <select class="custom-select @error('role') is-invalid @enderror" name="role">
                            <option value="">Seleccionar Role</option>
                            @foreach ($roles as $key => $value)
                                @if ($user->hasRole($value))
                                    <option value="{{ $value }}" selected>{{ $value }}</option>
                                @else
                                <option value="{{ $value }}" {{ old('role', $user->role) == $value ? 'selected' : '' }}>{{ $value }}</option>
                                @endif
                            @endforeach
                    </select>
                </div>
                @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.form group -->

            <!-- Entrada de email -->
            <div class="form-group">
                <label>Correo electronico:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-at"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control float-right @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="Ingresar correo electronico">
                </div> <!-- /.input group -->
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.form group -->

            <!-- Entrada de password -->
            <div class="form-group">
                <label>Contraseña:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-key" aria-hidden="true"></i>
                    </span>
                    </div>
                    <input type="password" class="form-control float-right @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Ingresar contraseña">
                </div> <!-- /.input group -->
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.form group -->

        </div>

    </div>
    
</div>
<!-- /.card-body -->

<div class="card-footer">
    <div class="row">
        <div class="col-12">
            <a href="{{ url('usuarios') }}" class="btn btn-info">Regresar</a>
            <button class="btn btn-danger" type="reset">Limpiar</button>
            <input type="submit" value="Enviar" class="btn btn-success float-right">
        </div>
    </div> 
</div>
<!-- /.card-footer -->