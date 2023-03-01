<?php

namespace App\Http\Controllers;
use App\Models\Postulante;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postulantes = Postulante::all();
        return view('postulantes.index', ['postulantes' => $postulantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postulantes.create', ['tipos'=> TipoDocumento::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([  
            'tipo' => 'required',
            'numero_documento' => 'required|unique:postulantes|max:10',
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'telefono' => 'required|',
            'email' => 'nullable|email'
        ]);

        $postulantes = new Postulante();
        $postulantes->tipo_documento_id = $request->input('tipo');
        $postulantes->numero_documento = $request->input('numero_documento');
        $postulantes->nombre = $request->input('nombre');
        $postulantes->fecha_nacimiento = $request->input('fecha');
        $postulantes->telefono = $request->input('telefono');
        $postulantes->email = $request->input('email');
        $postulantes->save();

        return view('postulantes.message',['msg'=>'Registro guardado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Http\Response
     */
    public function show(Postulante $postulante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postulante = Postulante::find($id);
        return view('postulantes.edit', ['postulante' => $postulante, 'tipos' => TipoDocumento::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'tipo' => 'required',
            'numero_documento' => 'required|max:10|unique:postulantes,numero_documento,' . $id,
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'telefono' => 'required|',
            'email' => 'nullable|email'
        ]);

        $postulantes = Postulante::find($id);
        $postulantes->tipo_documento_id = $request->input('tipo');
        $postulantes->numero_documento = $request->input('numero_documento');
        $postulantes->nombre = $request->input('nombre');
        $postulantes->fecha_nacimiento = $request->input('fecha');
        $postulantes->telefono = $request->input('telefono');
        $postulantes->email = $request->input('email');
        $postulantes->save();

        return view('postulantes.message',['msg'=>'Registro modificado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postulante = Postulante::find($id);
        $postulante->delete();

        return redirect("postulantes");
    }
}
