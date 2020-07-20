<link rel="stylesheet" href="{{ asset('dist/js/bootstrap.min.css') }}" >
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-info mb-3">
                <div class="card-header text-info">{{ __('Error. Permiso denegado') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="mx-auto">
                            <h1 class="text-info">ERROR 403</h1>
                            <p class="text-info"><b>¡Usted no tiene permisos para entrar a esta página!</b></p>
                            <p class="text-info">Solicita al administrador del sistema.</p>
                            <p>Clic para <a href="/home">Regresar</a></p>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>