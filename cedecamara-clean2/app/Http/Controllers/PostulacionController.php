<?php

namespace App\Http\Controllers;

use App\Models\Postulacion;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    // ✅ Método para formulario tradicional (POST)
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id_estudiante',
            'id_oferta' => 'required|exists:ofertas,id_oferta',
            'comentario' => 'nullable|string'
        ]);

        // evitar duplicado
        $existe = Postulacion::where('id_estudiante', $data['id_estudiante'])
                             ->where('id_oferta', $data['id_oferta'])
                             ->first();

        if ($existe) {
            return back()->with('error', 'Este estudiante ya está postulado a esta oferta.');
        }

        $data['fecha_postulacion'] = now()->toDateString();
        $data['estado'] = 'Pendiente';

        Postulacion::create($data);

        return back()->with('success', 'Postulación realizada correctamente.');
    }


    // ✅ ✅ NUEVO: método para postular desde el panel del estudiante (GET)
    public function postular($id_oferta)
    {
        // Revisar si hay sesión activa
        if (!session()->has('id_estudiante')) {
            return redirect()->route('estudiante.login')
                ->with('error', 'Debe iniciar sesión como estudiante.');
        }

        $id_estudiante = session('id_estudiante');

        // Evitar postulación duplicada
        $existe = Postulacion::where('id_estudiante', $id_estudiante)
                             ->where('id_oferta', $id_oferta)
                             ->first();

        if ($existe) {
            return redirect()->route('estudiante.postulaciones')
                ->with('error', 'Ya estás postulado a esta oferta.');
        }

        // Crear postulación
        Postulacion::create([
            'id_estudiante' => $id_estudiante,
            'id_oferta' => $id_oferta,
            'fecha_postulacion' => now()->toDateString(),
            'estado' => 'Pendiente'
        ]);

        return redirect()->route('estudiante.postulaciones')
            ->with('success', 'Te has postulado exitosamente.');
    }
}
