<a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left" title="Eliminar Usuario"><i class="fa fa-trash"></i></button></a>

<!--=====================================
MODAL ELIMINAR Estudiante
======================================-->
<form action="{{ route('usuarios.destroy', $user->id) }}" method="post">
    @csrf()
    @method('DELETE')
    
    <div id="modal-delete-{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-trash"></i> Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="alert alert-primary" role="alert">
                            ¿Estas seguro de eliminar a <strong> {{ $user->name }} {{ $user->first }} {{ $user->second }}</strong>? 
                        </div>
                    </div>
                </div>

            <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>

            </div>
        </div>
    </div>
</form>
