<?php

/**
 * Rutas web
 *
 * Este archivo contiene las definiciones de rutas para varios endpoints en la aplicación.
 * Cada ruta está asociada con un método específico en el UsuarioPedidoController.
 *
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioPedidoController;

Route::get('/', function () {
    return view('welcome');
});

/*
 * - GET /insertar-registros
 *   Llama al método 'insertarRegistros' para insertar nuevos registros en la base de datos.
 */
Route::get('/insertar-registros', [UsuarioPedidoController::class, 'insertarRegistros']);

/*
 * - GET /obtener-pedidos
 *   Llama al método 'obtenerPedidosConUsuarios' para obtener pedidos junto con sus usuarios asociados.
 */
Route::get('/obtener-pedidos', [UsuarioPedidoController::class, 'obtenerPedidosConUsuarios']);

/*
 * - GET /pedidos-rango
 *   Llama al método 'obtenerPedidosPorRango' para obtener pedidos dentro de un rango de fechas especificado.
 */
Route::get('/pedidos-rango', [UsuarioPedidoController::class, 'obtenerPedidosPorRango']);

/*
 * - GET /usuarios-letra-r
 *   Llama al método 'obtenerUsuariosPorLetra' para obtener usuarios cuyos nombres comienzan con la letra 'R'.
 */
Route::get('/usuarios-letra-r', [UsuarioPedidoController::class, 'obtenerUsuariosPorLetra']);

/*
 * - GET /contar-pedidos/{usuarioId?}
 *   Llama al método 'contarPedidosPorUsuario' para contar el número de pedidos de un usuario específico.
 *   El ID del usuario es opcional.
 */
Route::get('/contar-pedidos/{usuarioId?}', [UsuarioPedidoController::class, 'contarPedidosPorUsuario']);

/*
 * - GET /pedidos-ordenados
 *   Llama al método 'obtenerPedidosOrdenados' para obtener pedidos ordenados por un criterio específico.
 */
Route::get('/pedidos-ordenados', [UsuarioPedidoController::class, 'obtenerPedidosOrdenados']);

/*
 * - GET /suma-total-pedidos
 *   Llama al método 'obtenerSumaTotalPedidos' para obtener la suma total de todos los pedidos.
 */
Route::get('/suma-total-pedidos', [UsuarioPedidoController::class, 'obtenerSumaTotalPedidos']);

/*
 * - GET /pedido-mas-economico
 *   Llama al método 'obtenerPedidoMasEconomico' para obtener el pedido más económico.
 */
Route::get('/pedido-mas-economico', [UsuarioPedidoController::class, 'obtenerPedidoMasEconomico']);

/*
 * - GET /pedidos-agrupados
 *   Llama al método 'obtenerPedidosAgrupadosPorUsuario' para obtener pedidos agrupados por usuario.
 */
Route::get('/pedidos-agrupados', [UsuarioPedidoController::class, 'obtenerPedidosAgrupadosPorUsuario']);


// Melvin Alexander González Ramos
// k00002522
