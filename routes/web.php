<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\PostulacionController;
use App\Models\Oferta;
use App\Http\Controllers\InformePracticaController;
use App\Http\Controllers\EstudiantePanelController;
use App\Http\Controllers\EmpresaPanelController;
use App\Http\Controllers\AuthController;

// Rutas de autenticación unificada
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.do');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/estudiantes/crear', [EstudianteController::class, 'create'])->name('estudiante.create');
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiante.store');


Route::get('/empresas/crear', [EmpresaController::class, 'create'])->name('empresa.create');
Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresa.store');


Route::get('/ofertas/crear', [OfertaController::class, 'create'])->name('oferta.create');
Route::post('/ofertas', [OfertaController::class, 'store'])->name('oferta.store');


Route::post('/postulaciones', [PostulacionController::class, 'store'])->name('postulacion.store');
Route::get('/estudiante/postular/{id_oferta}', [PostulacionController::class, 'postular'])
    ->name('estudiante.postular');


Route::get('/ofertas/{id}', function($id) {
    $oferta = Oferta::with('empresa')->findOrFail($id);
    return view('ofertas.detalle', compact('oferta'));
})->name('oferta.detalle');


Route::get('/ofertas', function () {
    $ofertas = Oferta::with('empresa')->get();
    return view('ofertas.index', compact('ofertas'));
})->name('ofertas.index');


Route::get('/informes', [InformePracticaController::class, 'index'])->name('informes.index');
Route::get('/informes/crear', [InformePracticaController::class, 'create'])->name('informes.create');
Route::post('/informes', [InformePracticaController::class, 'store'])->name('informes.store');
Route::get('/informes/{id}', [InformePracticaController::class, 'show'])->name('informes.show');


Route::get('/estudiante/login', [EstudiantePanelController::class, 'loginForm'])->name('estudiante.login');
Route::post('/estudiante/login', [EstudiantePanelController::class, 'login'])->name('estudiante.login.do');

Route::get('/estudiante/panel', [EstudiantePanelController::class, 'panel'])->name('estudiante.panel');

Route::get('/estudiante/ofertas', [EstudiantePanelController::class, 'ofertas'])->name('estudiante.ofertas');
Route::get('/estudiante/postulaciones', [EstudiantePanelController::class, 'postulaciones'])->name('estudiante.postulaciones');
Route::get('/estudiante/informes', [EstudiantePanelController::class, 'informes'])->name('estudiante.informes');
Route::get('/estudiante/perfil', [EstudiantePanelController::class, 'perfil'])->name('estudiante.perfil');
Route::post('/estudiante/perfil', [EstudiantePanelController::class, 'perfilGuardar'])->name('estudiante.perfil.guardar');

Route::get('/estudiante/logout', function () {
    session()->forget('id_estudiante');
    return redirect()->route('login');
})->name('estudiante.logout');	

Route::get('/estudiante/ofertas/{id}', [EstudiantePanelController::class, 'verOferta'])
     ->name('estudiante.oferta.detalle');
	 

// Route::get('/empresa/login', [EmpresaPanelController::class, 'loginForm'])->name('empresa.login');
// Route::post('/empresa/login', [EmpresaPanelController::class, 'login'])->name('empresa.login.do');
Route::get('/empresa/logout', [EmpresaPanelController::class, 'logout'])->name('empresa.logout');

Route::get('/empresa/panel', [EmpresaPanelController::class, 'panel'])->name('empresa.panel');
Route::get('/empresa/ofertas', [EmpresaPanelController::class, 'ofertas'])->name('empresa.ofertas');
Route::get('/empresa/postulantes/{id_oferta}', [EmpresaPanelController::class, 'postulantes'])->name('empresa.postulantes');

Route::post('/empresa/postulantes/estado/{id}', [EmpresaPanelController::class, 'cambiarEstado'])
    ->name('empresa.postulantes.estado');





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
