@extends('layout/template')

@section('title', 'Postulantes')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Registrar Postulante</h2>

        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <form action="{{ url('postulantes') }}" method="POST">
        
            @csrf

            <div class="mb-3 row">
                <label for="tipo" class="col-sm-2 col-form-label">Tipo Documento:</label>
                <div class="col-sm-5">
                    <select name="tipo" id="tipo" class="form-select" required>
                        <option value="">Seleccionar tipo de documento</option>
                        @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->documento }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="numero_documento" class="col-sm-2 col-form-label">N° Documento:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="numero_documento" id="numero_documento" value="{{ old('numero_documento') }}" required>
                </div>
            </div>
        

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombres completos:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha de nacimiento:</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}" required>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Correo:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div>
            </div>

            <a href="{{ url('postulantes') }}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>

        </form>
    </div>
</main>