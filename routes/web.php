<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\PostagemController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

//Rotas para o CRUD de tarefas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('/tarefa')
->group(function(){
//Rotas para o CRUD de tarefas

Route::get('/', [TarefaController::class, 'index'])->name('tarefa.index');
Route::get('/create', [TarefaController::class, 'create'])->name('tarefa.create');
Route::post('/store', [TarefaController::class, 'store'])->name('tarefa.store');
Route::get('/{id}/show', [TarefaController::class, 'show'])->name('tarefa.show');
Route::get('/{id}/edit', [TarefaController::class, 'edit'])->name('tarefa.edit');
Route::put('/{id}/update', [TarefaController::class, 'update'])->name('tarefa.update');
//Rota para concluir a tarefa
Route::put('tarefa/{id}/{concluida}', [TarefaController::class, 'concluir'])->name('tarefa.concluir');
Route::delete('/{id}/destroy', [TarefaController::class, 'destroy'])->name('tarefa.destroy');
});

//Rotas para o CRUD de Postagens

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('/postagem')
->group(function(){
//Rotas para o CRUD de tarefas

Route::get('/', [PostagemController::class, 'index'])->name('postagem.index');
Route::get('/create', [PostagemController::class, 'create'])->name('postagem.create');
Route::post('/store', [PostagemController::class, 'store'])->name('postagem.store');
Route::get('/{id}/show', [PostagemController::class, 'show'])->name('postagem.show');
Route::get('/{id}/edit', [PostagemController::class, 'edit'])->name('postagem.edit');
Route::put('/{id}/update', [PostagemController::class, 'update'])->name('postagem.update');
Route::delete('/{id}/destroy', [PostagemController::class, 'destroy'])->name('postagem.destroy');
});
