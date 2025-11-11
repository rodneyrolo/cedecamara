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
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:estudiantes,email',
            'carrera' => 'required|string|max:50',
            'nrocelular' => 'nullable|string|max:20',
        ]);

        Estudiante::create($data);

        return redirect()->back()->with('success', 'Estudiante registrado correctamente');
    }
}