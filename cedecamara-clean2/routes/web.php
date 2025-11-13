<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    EstudianteController,
    EmpresaController,
    OfertaController,
    PostulacionController,
    InformePracticaController,
    EstudiantePanelController,
    EmpresaPanelController,
    AdministradorPanelController,
    AuthController
};
use App\Models\Oferta;

/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.do');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| RUTAS DE ESTUDIANTES
|--------------------------------------------------------------------------
*/
Route::get('/estudiantes/crear', [EstudianteController::class, 'create'])->name('estudiante.create');
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiante.store');

Route::get('/estudiante/login', [EstudiantePanelController::class, 'loginForm'])->name('estudiante.login');
Route::post('/estudiante/login', [EstudiantePanelController::class, 'login'])->name('estudiante.login.do');
Route::get('/estudiante/panel', [EstudiantePanelController::class, 'panel'])->name('estudiante.panel');

Route::get('/estudiante/ofertas', [EstudiantePanelController::class, 'ofertas'])->name('estudiante.ofertas');
Route::get('/estudiante/ofertas/{id}', [EstudiantePanelController::class, 'verOferta'])->name('estudiante.oferta.detalle');
Route::get('/estudiante/postulaciones', [EstudiantePanelController::class, 'postulaciones'])->name('estudiante.postulaciones');
Route::get('/estudiante/informes', [EstudiantePanelController::class, 'informes'])->name('estudiante.informes');
Route::get('/estudiante/perfil', [EstudiantePanelController::class, 'perfil'])->name('estudiante.perfil');
Route::post('/estudiante/perfil', [EstudiantePanelController::class, 'perfilGuardar'])->name('estudiante.perfil.guardar');
Route::get('/estudiante/logout', fn() => session()->forget('id_estudiante') ?: redirect()->route('login'))->name('estudiante.logout');

/*
|--------------------------------------------------------------------------
| RUTAS DE EMPRESAS
|--------------------------------------------------------------------------
*/
Route::get('/empresas/crear', [EmpresaController::class, 'create'])->name('empresa.create');
Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresa.store');

Route::get('/empresa/panel', [EmpresaPanelController::class, 'panel'])->name('empresa.panel');
Route::get('/empresa/ofertas', [EmpresaPanelController::class, 'ofertas'])->name('empresa.ofertas');
Route::get('/empresa/postulantes/{id_oferta}', [EmpresaPanelController::class, 'postulantes'])->name('empresa.postulantes');
Route::post('/empresa/postulantes/estado/{id}', [EmpresaPanelController::class, 'cambiarEstado'])->name('empresa.postulantes.estado');
Route::get('/empresa/logout', [EmpresaPanelController::class, 'logout'])->name('empresa.logout');

/*
|--------------------------------------------------------------------------
| RUTAS DE OFERTAS
|--------------------------------------------------------------------------
*/
Route::get('/ofertas', fn() => view('ofertas.index', ['ofertas' => Oferta::with('empresa')->get()]))->name('ofertas.index');
Route::get('/ofertas/{id}', fn($id) => view('ofertas.detalle', ['oferta' => Oferta::with('empresa')->findOrFail($id)]))->name('oferta.detalle');
Route::get('/ofertas/crear', [OfertaController::class, 'create'])->name('oferta.create');
Route::post('/ofertas', [OfertaController::class, 'store'])->name('oferta.store');
Route::post('/postulaciones', [PostulacionController::class, 'store'])->name('postulacion.store');
Route::get('/estudiante/postular/{id_oferta}', [PostulacionController::class, 'postular'])->name('estudiante.postular');

/*
|--------------------------------------------------------------------------
| INFORMES
|--------------------------------------------------------------------------
*/
Route::get('/informes', [InformePracticaController::class, 'index'])->name('informes.index');
Route::get('/informes/crear', [InformePracticaController::class, 'create'])->name('informes.create');
Route::post('/informes', [InformePracticaController::class, 'store'])->name('informes.store');
Route::get('/informes/{id}', [InformePracticaController::class, 'show'])->name('informes.show');

/*
|--------------------------------------------------------------------------
| ADMINISTRADOR
|--------------------------------------------------------------------------
*/
Route::get('/administrador/login', [AdministradorPanelController::class, 'loginForm'])->name('administrador.login');
Route::post('/administrador/login', [AdministradorPanelController::class, 'login'])->name('administrador.login.do');
Route::get('/administrador/logout', [AdministradorPanelController::class, 'logout'])->name('administrador.logout');

// PANEL DEL ADMINISTRADOR (agrupado)
Route::prefix('administrador')->group(function () {
    Route::get('/panel', [AdministradorPanelController::class, 'panel'])->name('administrador.panel');

Route::get('/ofertas', [AdministradorPanelController::class, 'ofertas'])->name('administrador.ofertas');

    // Gestión de ofertas con modales
    //Route::get('/ofertas', [AdministradorPanelController::class, 'ofertas'])->name('admin.ofertas');
    Route::post('/ofertas/crear', [AdministradorPanelController::class, 'crearOferta'])->name('admin.ofertas.crear');
    Route::post('/ofertas/actualizar/{id}', [AdministradorPanelController::class, 'actualizarOferta'])->name('admin.ofertas.actualizar');
    Route::delete('/ofertas/eliminar/{id}', [AdministradorPanelController::class, 'eliminarOferta'])->name('admin.ofertas.eliminar');

    // Gestión empresas
    Route::get('/empresas', [AdministradorPanelController::class, 'empresas'])->name('administrador.empresas');
    Route::get('/empresas/{id}/editar', [AdministradorPanelController::class, 'editarEmpresa'])->name('administrador.empresas.editar');
    Route::post('/empresas/{id}/actualizar', [AdministradorPanelController::class, 'actualizarEmpresa'])->name('administrador.empresas.actualizar');
    Route::delete('/empresas/{id}', [AdministradorPanelController::class, 'eliminarEmpresa'])->name('administrador.empresas.eliminar');

    // Gestión estudiantes
    Route::get('/estudiantes', [AdministradorPanelController::class, 'estudiantes'])->name('administrador.estudiantes');
    Route::get('/estudiantes/{id}/editar', [AdministradorPanelController::class, 'editarEstudiante'])->name('administrador.estudiantes.editar');
    Route::post('/estudiantes/{id}/actualizar', [AdministradorPanelController::class, 'actualizarEstudiante'])->name('administrador.estudiantes.actualizar');
    Route::delete('/estudiantes/{id}', [AdministradorPanelController::class, 'eliminarEstudiante'])->name('administrador.estudiantes.eliminar');
});

/*
|--------------------------------------------------------------------------
| RAÍZ
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('auth.login'));
