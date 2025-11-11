<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Oferta;
use App\Models\Postulacion;
use App\Models\InformePractica;
use Illuminate\Http\Request;

class EstudiantePanelController extends Controller
{
    // Formulario login
    public function loginForm()
    {
        return view('estudiante.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id_estudiante'
        ]);

        session(['id_estudiante' => $request->id_estudiante]);

        return redirect()->route('estudiante.panel');
    }

    // Panel principal
    public function panel()
    {
        $estudiante = Estudiante::findOrFail(session('id_estudiante'));

        return view('estudiante.panel', compact('estudiante'));
    }

    // Ver ofertas disponibles
    public function ofertas()
    {
        $ofertas = Oferta::with('empresa')->get();

        return view('estudiante.ofertas', compact('ofertas'));
    }

    // Ver postulaciones
    public function postulaciones()
    {
        $estudianteId = session('id_estudiante');

        $postulaciones = Postulacion::with(['oferta.empresa'])
            ->where('id_estudiante', $estudianteId)
            ->get();

        return view('estudiante.postulaciones', compact('postulaciones'));
    }

    // Ver informes
    public function informes()
    {
        $informes = InformePractica::with(['oferta'])
            ->where('id_estudiante', session('id_estudiante'))
            ->get();

        return view('estudiante.informes', compact('informes'));
    }
	
	 // Ver oferta
 public function verOferta($id)
{
    $oferta = Oferta::with('empresa')->findOrFail($id);
    return view('estudiante.detalle_oferta', compact('oferta'));
}

public function perfil()
{
    $estudiante = Estudiante::findOrFail(session('id_estudiante'));
    return view('estudiante.perfil', compact('estudiante'));
}

public function perfilGuardar(Request $request)
{
    $estudiante = Estudiante::findOrFail(session('id_estudiante'));

    $estudiante->update($request->all());

    return back()->with('success', 'Perfil actualizado correctamente.');
}


}
