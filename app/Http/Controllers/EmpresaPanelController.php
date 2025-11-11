<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\Postulacion;
use Illuminate\Http\Request;

class EmpresaPanelController extends Controller
{
    // ✅ Mostrar formulario de login
    public function loginForm()
    {
        return view('empresa.login');
    }

    // ✅ Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'id_empresa' => 'required|exists:empresas,id_empresa'
        ]);

        session(['id_empresa' => $request->id_empresa]);

        return redirect()->route('empresa.panel');
    }

    // ✅ Cerrar sesión
    public function logout()
    {
        session()->forget('id_empresa');
        return redirect()->route('login');
    }

    // ✅ Vista principal del panel
    public function panel()
    {
        if (!session()->has('id_empresa')) {
            return redirect()->route('empresa.login');
        }

        $empresa = Empresa::findOrFail(session('id_empresa'));

        return view('empresa.panel', compact('empresa'));
    }

    // ✅ Listar las ofertas que pertenecen a esta empresa
    public function ofertas()
    {
        if (!session()->has('id_empresa')) {
            return redirect()->route('empresa.login');
        }

        $ofertas = Oferta::where('id_empresa', session('id_empresa'))->get();

        return view('empresa.ofertas', compact('ofertas'));
    }

    // ✅ Ver postulantes de una oferta
    public function postulantes($id_oferta)
    {
        if (!session()->has('id_empresa')) {
            return redirect()->route('empresa.login');
        }

        $oferta = Oferta::where('id_empresa', session('id_empresa'))
                        ->where('id_oferta', $id_oferta)
                        ->firstOrFail();

        $postulantes = Postulacion::with('estudiante')
                        ->where('id_oferta', $id_oferta)
                        ->get();

        return view('empresa.postulantes', compact('oferta', 'postulantes'));
    }

    // ✅ Cambiar estado de un postulante
    public function cambiarEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:Pendiente,Aceptada,Rechazada'
        ]);

        $postulacion = Postulacion::findOrFail($id);

        // Validar que la oferta pertenece a la empresa
        if ($postulacion->oferta->id_empresa != session('id_empresa')) {
            return back()->with('error', 'No tienes permiso para cambiar este estado.');
        }

        $postulacion->estado = $request->estado;
        $postulacion->save();

        return back()->with('success', 'Estado actualizad');
}


}
