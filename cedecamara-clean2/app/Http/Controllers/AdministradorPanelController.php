<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use App\Models\Empresa;
use App\Models\Estudiante;
use App\Models\Oferta;

class AdministradorPanelController extends Controller
{
    // ✅ Mostrar formulario de login
    public function loginForm()
    {
        return view('administrador.login');
    }

    // ✅ Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'id_administrador' => 'required|exists:administradores,id_administrador'
        ]);

        session(['id_administrador' => $request->id_administrador]);

        return redirect()->route('administrador.panel');
    }

    // ✅ Cerrar sesión
    public function logout()
    {
        session()->forget('id_administrador');
        return redirect()->route('login');
    }

    // ✅ Vista principal del panel
    public function panel()
    {
        if (!session()->has('id_administrador')) {
            return redirect()->route('administrador.login');
        }

        $administrador = Administrador::findOrFail(session('id_administrador'));
        $empresas = Empresa::all();
        $ofertas = Oferta::with('empresa')->get();

        return view('administrador.panel', compact('administrador', 'empresas', 'ofertas'));
    }

    // Mostrar la vista de gestión de ofertas para el administrador
    public function ofertas()
    {
        if (!session()->has('id_administrador')) {
            return redirect()->route('administrador.login');
        }
$empresas = Empresa::all();
        $ofertas = Oferta::with('empresa')->get();
        return view('administrador.ofertas', compact('ofertas','empresas'));
    }
    
    /* =====================
       OFERTAS
    ===================== */

    // ✅ Crear oferta (AJAX)
    public function crearOferta(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'modalidad' => 'nullable|string|max:100',
			'estado' => 'nullable|string|max:100',
            'id_empresa' => 'required|integer|exists:empresas,id_empresa',
        ]);

        $oferta = Oferta::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'modalidad' => $request->modalidad,
            'id_empresa' => $request->id_empresa,
            'fecha_publicacion' => now(),
            'estado' => $request->estado,
        ]);

        $oferta->load('empresa');

        return response()->json([
            'success' => true,
            'message' => 'Oferta creada correctamente.',
            'oferta' => $oferta,
        ]);
    }

    // ✅ Actualizar oferta (AJAX)
    public function actualizarOferta(Request $request, $id_oferta)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'modalidad' => 'nullable|string|max:100',
			'estado' => 'nullable|string|max:100',
            'id_empresa' => 'required|integer|exists:empresas,id_empresa',
        ]);

        $oferta = Oferta::findOrFail($id_oferta);
        $oferta->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'modalidad' => $request->modalidad,
			'estado' => $request->estado,
            'id_empresa' => $request->id_empresa,
        ]);

        $oferta->load('empresa');

        return response()->json([
            'success' => true,
            'message' => 'Oferta actualizada correctamente.',
            'oferta' => $oferta,
        ]);
    }

    // ✅ Eliminar oferta (AJAX)
    public function eliminarOferta($id_oferta)
    {
        $oferta = Oferta::findOrFail($id_oferta);
        $oferta->delete();

        return response()->json([
            'success' => true,
            'message' => 'Oferta eliminada correctamente.',
        ]);
    }

    // ✅ Cambiar estado oferta
    public function actualizarEstadoOferta(Request $request, $id_oferta)
    {
        $request->validate(['estado' => 'required|in:Activa,Inactiva']);
        $oferta = Oferta::findOrFail($id_oferta);
        $oferta->estado = $request->estado;
        $oferta->save();

        return response()->json([
            'success' => true,
            'message' => 'Estado actualizado.',
            'oferta' => $oferta,
        ]);
    }

    /* =====================
       EMPRESAS
    ===================== */
    public function empresas()
    {
        $empresas = Empresa::all();
        return view('administrador.empresas', compact('empresas'));
    }

    public function editarEmpresa($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('administrador.empresas_editar', compact('empresa'));
    }

    public function actualizarEmpresa(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());
        return redirect()->route('administrador.empresas')->with('success', 'Empresa actualizada correctamente.');
    }

    public function eliminarEmpresa($id)
    {
        Empresa::findOrFail($id)->delete();
        return back()->with('success', 'Empresa eliminada.');
    }

    /* =====================
       ESTUDIANTES
    ===================== */
    public function estudiantes()
    {
        $estudiantes = Estudiante::all();
        return view('administrador.estudiantes', compact('estudiantes'));
    }

    public function editarEstudiante($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('administrador.estudiantes_editar', compact('estudiante'));
    }

    public function actualizarEstudiante(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());
        return redirect()->route('administrador.estudiantes')->with('success', 'Estudiante actualizado correctamente.');
    }

    public function eliminarEstudiante($id)
    {
        Estudiante::findOrFail($id)->delete();
        return back()->with('success', 'Estudiante eliminado.');
    }
}
