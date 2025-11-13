<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Empresa;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function create()
    {
        $empresas = Empresa::all();
        return view('ofertas.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_empresa' => 'required|exists:empresas,id_empresa',
            'titulo' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
			'modalidad' => 'required|string|max:100',
            'fecha_publicacion' => 'nullable|date',
            'estado' => 'nullable|string|max:20',
        ]);

        Oferta::create($data);

        return redirect()->back()->with('success', 'Oferta publicada correctamente');
    }
}
