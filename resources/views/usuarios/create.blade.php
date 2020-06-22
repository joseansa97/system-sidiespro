@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('usuarios') }}" method="POST">
@csrf

    <div class="row"> 
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Registrar nuevo usuario</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-danger btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
