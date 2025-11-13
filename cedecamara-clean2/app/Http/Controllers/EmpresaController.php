<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_empresa' => 'required|string|max:150',
            'direccion' => 'nullable|string|max:200',
            'nrocelular' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:150'
        ]);

        Empresa::create($data);

       return redirect()->route('administrador.panel')->with('success', 'Empresa creada correctamente.');
    }
}