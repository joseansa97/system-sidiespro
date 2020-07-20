@extends('layouts.app')

@section('content')

@include('partials.errores')

<form action="{{ route('usuarios.update', $user->id) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="row"> 
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Actualizar información del usuario</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>

                @include('usuarios._form')

            </div>
            <!-- /.card -->      
        </div> 
    </div>
</form>

@endsection
