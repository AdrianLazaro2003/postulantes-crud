@extends('layout/template')

@section('title', 'Postulantes')

@section('contenido')

<main>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Laravel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('postulantes') }}">Registro Postulantes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('formulario_postulaciones') }}">Registrar postulaciones</a>
              </li>
            </ul>
          </div>

        </div>
      </nav>

    <div class="container py-4 ">
        <h2 class="text-center m-4">Listado de Postulantes</h2>

        <div class="d-md-flex justify-content-md-end">
          <form action="{{ route('postulantes.index') }}" method="GET">
              <div class="btn-group">
                  <input type="text" name="busqueda" class="form-control">
                  <input type="submit" name="enviar" class="btn btn-primary">
              </div>
          </form>
      </div>

        <a href="{{ url("postulantes/create") }}" class="btn btn-primary btn-sm m-4">Nuevo Registro</a>

        <table class="table table-striped table-hover table-secondary">

            <thead>

                <tr>
                    <th>#</th>
                    <th>T. Documento</th>
                    <th>N° Documento</th>
                    <th>Nombre y Apellidos</th>
                    <th>Fecha Nacimiento</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th></th>
                    <th></th>
                </tr>

            </thead>

            <tbody>
                @foreach($postulantes as $postulante)
                    <tr>
                        <td>{{$postulante->id}}</td>
                        <td>{{$postulante->tipo_documento->documento}}</td>
                        <td>{{$postulante->numero_documento}}</td>
                        <td>{{$postulante->nombre}}</td>
                        <td>{{$postulante->fecha_nacimiento}}</td>
                        <td>{{$postulante->telefono}}</td>
                        <td>{{$postulante->email}}</td>
                        <td><a href="{{ url('postulantes/'.$postulante->id.'/edit') }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td>
                            <form action="{{ url('postulantes/'.$postulante->id) }}" method="POST">
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
              <td colspan="4">{{ $postulantes->appends(['busqueda'=>$busqueda]) }}</td>
          </tr>
        </tfoot>

    </div>
</main>
