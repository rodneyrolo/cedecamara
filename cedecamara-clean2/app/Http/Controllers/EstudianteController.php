<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function create()
    {
        return view('estudiantes.create');
    }

	
	public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:estudiantes,email',
        'nrocelular' => 'nullable|string|max:20',
        'carrera' => 'nullable|string|max:255',
    ]);

    \App\Models\Estudiante::create($request->only(['nombre','email','carrera','nrocelular']));

    return redirect()->route('administrador.panel')->with('success', 'Estudiante creado correctamente.');
}
}