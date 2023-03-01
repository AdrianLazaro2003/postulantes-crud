@extends('layout/template')

@section('title', 'Postulantes')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>{{ $msg }}</h2>

        <a href="{{ url('postulantes') }}" class="btn btn-secondary">Regresar</a>