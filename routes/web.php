<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioPedidoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/insertar-registros', [UsuarioPedidoController::class, 'insertarRegistros']);
Route::get('/obtener-pedidos', [UsuarioPedidoController::class, 'obtenerPedidosConUsuarios']);
Route::get('/pedidos-rango', [UsuarioPedidoController::class, 'obtenerPedidosPorRango']);
Route::get('/usuarios-letra-r', [UsuarioPedidoController::class, 'obtenerUsuariosPorLetra']);
Route::get('/contar-pedidos/{usuarioId?}', [UsuarioPedidoController::class, 'contarPedidosPorUsuario']);
Route::get('/pedidos-ordenados', [UsuarioPedidoController::class, 'obtenerPedidosOrdenados']);
Route::get('/suma-total-pedidos', [UsuarioPedidoController::class, 'obtenerSumaTotalPedidos']);
Route::get('/pedido-mas-economico', [UsuarioPedidoController::class, 'obtenerPedidoMasEconomico']);
Route::get('/pedidos-agrupados', [UsuarioPedidoController::class, 'obtenerPedidosAgrupadosPorUsuario']);

// Melvin Alexander González Ramos
// k00002522
