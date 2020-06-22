<!--=====================================
    MODAL MOSTRAR EL ARCHIVO
======================================-->

<div id="modal-archivo-{{$student->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
  
          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-eye"></i> Vista Detalle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <!--=====================================
          CUERPO DEL MODAL
          ======================================-->
          <div class="modal-body">
  
            <div class="box-body">
  
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Titulo del proyecto: <b>{{ $student->titulo }}</b></p>
                                <p>Asesor: <b>{{ $student->asesor }}</b></p>
                                <p>Primer Integrante: <b>{{ $student->autor }}</b></p>
                            </div>
                            <div class="col-md-6">
                                <p>Segundo Integrante: <b>{{ $student->autor2 }}</b></p>
                                <p>Carrera: <b>{{ $student->carrera_id }}</b></p>
                                <p>Tipo: <b>{{ $student->residencia_id }}</b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <iframe width="100%" height="400px" src="{{ asset($student->archivo) }}"  frameborder="0"></iframe>
                    </div>
                </div>
  
            </div>
  
          </div>
  
        <!--=====================================
          PIE DEL MODAL
          ======================================-->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
          </div>
  
      </div>
    </div>
  </div>
  