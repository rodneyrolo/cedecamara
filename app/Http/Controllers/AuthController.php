<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleLogin(Request $request)
    {
        $request->validate([
            'tipo_ingreso' => 'required|in:estudiante,empresa',
            'id' => 'required|numeric',
        ]);

        $userType = $request->input('tipo_ingreso');
        $userId = $request->input('id');

        if ($userType === 'estudiante') {
            $user = Estudiante::find($userId);
            if ($user) {
                Session::put('id_estudiante', $user->id_estudiante);
                return Redirect::to('/estudiante/panel');
            }
        } elseif ($userType === 'empresa') {
            $user = Empresa::find($userId);
            if ($user) {
                Session::put('id_empresa', $user->id_empresa);
                return Redirect::to('/empresa/panel');
            }
        }

        return Redirect::back()->withErrors(['id' => 'El ID no existe o es incorrecto.']);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Session::flush();
        return Redirect::to('/login');
    }
}
