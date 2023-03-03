<?php

namespace App\Http\Controllers;

use App\Models\FormularioPostulacion;
use App\Models\TipoEstado;
use App\Models\TipoServicio;
use Illuminate\Http\Request;

class FormularioPostulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $formularios = FormularioPostulacion::where('postulante_id','LIKE','%'.$busqueda.'%')
                ->latest('id')
                ->paginate(7);

        return view('formulario_postulaciones.index', ['formularios' => $formularios], ['busqueda' => $busqueda]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormularioPostulacion  $formularioPostulacion
     * @return \Illuminate\Http\Response
     */
    public function show(FormularioPostulacion $formularioPostulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormularioPostulacion  $formularioPostulacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formulario = FormularioPostulacion::find($id);
        return view('formulario_postulaciones.edit',['formulario' => $formulario, 'servicios' => TipoServicio::all(), 'estados' => TipoEstado::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormularioPostulacion  $formularioPostulacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required',
            'observaciones' => 'required|max:255',
        ]);

        $formulario = FormularioPostulacion::find($id);
        $formulario->remoto_id = $request->input('tipo');
        $formulario->observaciones = $request->input('observaciones');
        $formulario->estado_id = $request->input('estado');
        $formulario->save();

        return view("formulario_postulaciones.message", ['msg' => "Editado correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormularioPostulacion  $formularioPostulacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formulario = FormularioPostulacion::find($id);
        $formulario->delete();

        return redirect('formulario_postulaciones');
    }
}
