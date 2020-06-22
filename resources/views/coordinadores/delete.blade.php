<form action="{{ route('coordinadores.destroy', $coordinator->cuid) }}" method="POST" style="display:inline-block;">
@csrf()
@method('DELETE')
<!--=====================================
MODAL ELIMINAR Estudiante
======================================-->
<div id="modal-delete-{{$coordinator->cuid}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-trash"></i> Eliminar Registro</h5>
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
                <p>¿Estas seguro de eliminar?</p> 
                <strong>{{ $coordinator->name }}</strong>
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