@extends('layout/template')

@section('title', 'Postulantes')


@section('contenido')

    <main>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Laravel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('postulantes') }}">Registro
                                Postulantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ url('formulario_postulaciones') }}">Registrar postulaciones</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container py-4">
            <h2 class="text-center m-4">Formulario de los Postulantes</h2>

            <div class="d-md-flex justify-content-md-end">
                <form action="{{ route('formulario_postulaciones.index') }}" method="GET">
                    <div class="btn-group">
                        <input type="text" name="busqueda" class="form-control">
                        <input type="submit" name="enviar" class="btn btn-primary">
                    </div>
                </form>
            </div>

            <div class="pt-5">


                <table class="table table-striped table-hover table-secondary table-danger" id="formulario">

                    <thead>
                        <tr>
                            <th>Id Postulante</th>
                            <th>Id Documento</th>
                            <th>Id Tipo Servicio</th>
                            <th>Observaciones</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($formularios as $formulario)
                            <tr>
                                <td>{{ $formulario->postulante_id }}</td>
                                <td>{{ $formulario->documento_id }}</td>
                                <td>{{ $formulario->remoto_id }}</td>
                                <td>{{ $formulario->observaciones }} </td>
                                <td>{{ $formulario->estado_id }} </td>
                                <td> <a href="{{ url('formulario_postulaciones/' . $formulario->id . '/edit') }}"
                                        class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> </td>
                                <td>
                                    <form action="{{ url('formulario_postulaciones/' . $formulario->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    

                </table>

                <tfoot>
                    <tr>
                        <td colspan="4">{{ $formularios->appends(['busqueda'=>$busqueda]) }}</td>
                    </tr>
                </tfoot>
                
            </div>


        </div>
    </main>

