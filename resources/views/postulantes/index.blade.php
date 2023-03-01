@extends('layout/template')

@section('title', 'Postulantes')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Listado de Postulantes</h2>

        <a href="{{ url("postulantes/create") }}" class="btn btn-primary btn-sm">Nuevo Registro</a>

        <table class="table table-hover">

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
                        <td><a href="{{ url('postulantes/'.$postulante->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a></td>
                        <td>
                            <form action="{{ url('postulantes/'.$postulante->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</main>