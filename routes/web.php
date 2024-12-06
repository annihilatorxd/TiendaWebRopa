<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VestimentaController;
use App\Http\Controllers\DetalleVestimentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;

// web.php






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



//Auth::routes();
//registro
/* Route::get('/pdf', [ProductoController::class, 'pdf'])->name('.pdf'); */
Route::get('/register', [RegisterController::class, 'show'])->name('show.register');
Route::post('/registro', [RegisterController::class, 'registrar'])->name('post.register');
//login
Route::get('/login', [LoginController::class, 'show'])->name('show.login');
Route::post('/login', [LoginController::class, 'login'])->name('post.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//prueba
Route::get('/test', [RegisterController::class, 'test'])->name('test.register');

Route::resource('vestimentas',VestimentaController::class);//->middleware(['middleware_name'])->only(['create', 'edit'])
Route::get('/', [VestimentaController::class, 'index'])->name('inicio');

Route::get('/admin/vestimentas', [VestimentaController::class, 'mostrarLista'])->name('admin.show.vestimenta');
Route::get('/admin/vestimentas/{id}', [VestimentaController::class, 'mostrarEditar'])->name('admin.edit.vestimenta');
//Route::get('/admin/talla/{id}', [VestimentaController::class, 'talla'])->name('admin.talla.vestimenta');

Route::resource('detalles_vestimentas',DetalleVestimentaController::class);
Route::get('/detalles_vestimenta/talla/{id}',[DetalleVestimentaController::class, 'talla'])->name('detalles_vestimentas.talla');

Route::get('/mostrar-prendas', [VestimentaController::class, 'mostrarPrendas'])->name('filtrar-prenda');


Route::get('/compra-producto/{idProducto}', [ProductoController::class, 'mostrarCompraProducto'])->name('compra.producto');
Route::post('/realizar-compra/{id}.pdf', [ProductoController::class, 'realizarCompra'])->name('compra.pdf');


/*

Route::get('/', [PrendaController::class, 'inicioMostrar'])->name('inicio');
Route::get('/agregar-prenda', [PrendaController::class, 'agregarPrenda'])->name('agregar-prenda');
Route::post('/guardar-prenda', [PrendaController::class, 'guardarPrenda'])->name('guardar_prenda');
//Route::get('/lista-prendas', [PrendaController::class, 'mostrarLista'])->name('lista-prendas');

Route::post('/actualizar-prenda/{id}', [PrendaController::class, 'actualizar'])->name('actualizar-prenda');
Route::delete('/eliminar-prenda/{id}', [PrendaController::class, 'destroy'])->name('eliminar-prenda');



Route::get('/agregar-prenda', [PrendaController::class, 'agregarPrenda'])->name('agregar-prenda')->middleware('checkadmin');
Route::get('/lista-prendas', [PrendaController::class, 'mostrarLista'])->name('lista-prendas')->middleware('checkadmin');
Route::get('/acceso-denegado', [PrendaController::class, 'denegado'])->name('show.denegado');


*/