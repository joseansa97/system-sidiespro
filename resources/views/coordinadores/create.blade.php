<!--=====================================
MODAL AGREGAR COORDINADOR A UNA CARRERA
======================================-->
<form action="{{ url('coordinadores') }}" method="POST">
@csrf
<div id="modalAgregarCoordinador" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-plus"></i> Registrar Coordinador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @include('coordinadores._form')

    </div>
  </div>
</div>
</form>