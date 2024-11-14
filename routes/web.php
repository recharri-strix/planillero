<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seguridad\RoleController;
use App\Http\Controllers\Planillas\VuelosController;
use App\Http\Controllers\seguridad\ProfileController;
use App\Http\Controllers\seguridad\UsuarioController;
use App\Http\Controllers\seguridad\PermisosController;
use App\Http\Controllers\Planillas\PlanillasController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware('auth')->group(function () {
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'main'])->name('main');

    Route::resources([
    'usuario' => UsuarioController::class,
    ]);

    //perfil de usuario
    Route::get('profile/{id}/editar', [ProfileController::class, 'index'])->name('profile');
    Route::post('foto/profile/guardar', [ProfileController::class, 'foto'])->name('profile.foto');
    Route::post('profile', [ProfileController::class, 'save'])->name('profile.save');
    Route::get('profile/{id}/readonly', [ProfileController::class, 'readonly'])->name('profile.readonly');
    Route::get('roles/combos/json', [RoleController::class, 'rolesJson'])->name('roles.json');

    Route::get('/planillas', [PlanillasController::class, 'index'])->name('planillas.index');
    Route::get('/planillas/nueva', [PlanillasController::class, 'nueva'])->name('planillas.nueva');
    Route::get('/planillas/editar/{id}', [PlanillasController::class, 'editar'])->name('planillas.editar');
    Route::post('/planillas/store/{id?}', [PlanillasController::class, 'store'])->name('planillas.store');
    Route::get('/planillas/{id}/vuelos', [PlanillasController::class, 'vuelos'])->name('planillas.vuelos');
    route::get('/planillas/filtrar', [PlanillasController::class, 'filtrar'])->name('planillas.filtrar');
    Route::post('/planillas/finalizar/{id}', [PlanillasController::class, 'finalizar'])->name('planillas.finalizar');

    Route::get('/vuelos/nueva/{id}', [VuelosController::class, 'nueva'])->name('vuelos.nueva');
    Route::get('/vuelos/{id}/vuelos', [VuelosController::class, 'index'])->name('vuelos.index');
    Route::get('/vuelos/editar/{id}', [VuelosController::class, 'editar'])->name('vuelos.editar');
    Route::post('/vuelos/store/{id?}', [VuelosController::class, 'store'])->name('vuelos.store');
    Route::get('/vuelos/imprimir/{id}', [VuelosController::class, 'imprimir'])->name('vuelos.imprimir');
    Route::post('/vuelos/finalizar/{id}', [VuelosController::class, 'finalizar'])->name('vuelos.finalizar');
    Route::post('/vuelos/anular/{id}', [VuelosController::class, 'anular'])->name('vuelos.anular');

    // Route::group(['middleware' => ['permission:adm_permisos']], function () {
        Route::resources([
            'usuario' => UsuarioController::class,
            'roles' => RoleController::class,
            'permisos' => permisosController::class,
        ]);
        Route::get('usuario/{id}/roles/{rolid}/{tarea}', [UsuarioController::class, 'roles']);
        Route::get('usuario/{id}/roles', [UsuarioController::class, 'roles'])->name('usuarios.grupos');
        Route::get('usuario/{id}/permisos/{perid}/{tarea}', [UsuarioController::class, 'permisos']);
        Route::get('usuario/{id}/permisos', [UsuarioController::class, 'permisos']);

        Route::get('roles/{id}/permisos/{perid}/{tarea}', [RoleController::class, 'permisos']);
        Route::get('roles/{id}/permisos', [RoleController::class, 'permisos']);
        Route::get('roles/{id}/usuarios/{usuid}/{tarea}', [RoleController::class, 'usuarios']);
        Route::get('roles/{id}/usuarios', [RoleController::class, 'usuarios']);

        Route::get('permisos/{id}/usuarios/{usuid}/{tarea}', [permisosController::class, 'usuarios']);
        Route::get('permisos/{id}/usuarios', [permisosController::class, 'usuarios'])->name('permisos.usuarios');
        Route::get('permisos/{id}/roles/{rolid}/{tarea}', [permisosController::class, 'roles']);
        Route::get('permisos/{id}/roles', [permisosController::class, 'roles'])->name('permisos.grupos');
    // });
});
