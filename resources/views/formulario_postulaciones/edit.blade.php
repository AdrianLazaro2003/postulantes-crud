@extends('layout/template')

@section('title', 'Postulantes')

@section('contenido')

    <main>
        <div class="container py-4">
            <h2>Buscar y agregar Postulantes</h2>

            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ url('formulario_postulaciones', $formulario->id) }}" method="POST">

                @method('put')

                @csrf

                <div class="mb-3 row">
                    <label for="tipo" class="col-sm-2 col-form-label">Tipo Servicio:</label>
                    <div class="col-sm-5">
                        <select name="tipo" id="tipo" class="form-select" required>
                            <option value="">Seleccionar tipo de Servicio</option>
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="observaciones" class="col-sm-2 col-form-label">Observaciones:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="observaciones" id="observaciones"
                            value="{{ $formulario->observaciones }}" required>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="estado" class="col-sm-2 col-form-label">Tipo Estado:</label>
                    <div class="col-sm-5">
                        <select name="estado" id="estado" class="form-select" required>
                            <option value="">Seleccionar tipo de Estado:</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <a href="{{ url('formulario_postulaciones') }}" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>

            </form>


        </div>
    </main>
