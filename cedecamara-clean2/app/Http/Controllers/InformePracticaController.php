<?php

namespace App\Http\Controllers;

use App\Models\InformePractica;
use App\Models\Estudiante;
use App\Models\Oferta;
use Illuminate\Http\Request;

class InformePracticaController extends Controller
{
    // Listar informes
    public function index()
    {
        $informes = InformePractica::with(['estudiante', 'oferta'])->orderBy('fecha_entrega', 'desc')->get();

        return view('informes.index', compact('informes'));
    }

    // Formulario crear informe
    public function create()
    {
        $estudiantes = Estudiante::all();
        $ofertas = Oferta::with('empresa')->get();

        return view('informes.create', compact('estudiantes', 'ofertas'));
    }

    // Guardar informe
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id_estudiante',
            'id_oferta' => 'required|exists:ofertas,id_oferta',
            'fecha_entrega' => 'required|date',
            'calificacion' => 'nullable|numeric|min:0|max:100',
            'comentarios' => 'nullable|string',
        ]);

        InformePractica::create($data);

        return redirect()->route('informes.index')
            ->with('success', 'Informe registrado correctamente');
    }

    // Ver detalle de un informe
    public function show($id)
    {
        $informe = InformePractica::with(['estudiante', 'oferta'])->findOrFail($id);

        return view('informes.show', compact('informe'));
    }
}
