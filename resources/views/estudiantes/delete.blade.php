<a href="" data-target="#modal-delete-{{$student->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>

<!--=====================================
MODAL ELIMINAR Estudiante
======================================-->
<form action="{{ route('estudiantes.destroy', $student->id) }}" method="post" style="display:inline-block;">
    @csrf()
    @method('DELETE')
    
    <div id="modal-delete-{{$student->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-trash"></i> Eliminar el Proyecto</h5>
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
                            ¿Estas seguro de eliminar el proyecto <strong> {{ $student->titulo }} </strong>? 
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
