<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\SitioController;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/info/{tipo?}', [SitioController::class, 'info']);

// Route::get('/comentario/create', [ComentarioController::class, 'create']);
// Route::post('/comentario-guarda', [ComentarioController::class, 'store']);
Route::resource('comentario', ComentarioController::class);
Route::resource('alumno', AlumnoController::class);
Route::get('/alumno/{alumno}/agendar-materia', [AlumnoController::class, 'agendarMateria'])->name('alumno.agendar-materia');
Route::post('/alumno/{alumno}/relacionar-materia-alumno', [AlumnoController::class, 'relacionarMateriaConAlumno'])->name('alumno.relacionar-materia-alumno');
Route::get('/comentario/download/{archivo}', [AlumnoController::class, 'download'])
    ->name('comentario.download');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin/usuario/demo', function () {
   return view('demo'); 
});
