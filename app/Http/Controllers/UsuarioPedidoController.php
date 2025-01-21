<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Pedido;

class UsuarioPedidoController extends Controller
{
    /**
     * Inserta registros en la tabla de usuarios y pedidos.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertarRegistros()
    {
        // Inserta 5 usuarios en la tabla 'usuarios'
        $usuarios = [
            ['nombre' => 'Juan Pérez', 'correo' => 'juan.perez@example.com', 'telefono' => '1234567890'],
            ['nombre' => 'Ana López', 'correo' => 'ana.lopez@example.com', 'telefono' => '0987654321'],
            ['nombre' => 'Carlos Martínez', 'correo' => 'carlos.martinez@example.com', 'telefono' => '1122334455'],
            ['nombre' => 'María Gómez', 'correo' => 'maria.gomez@example.com', 'telefono' => '5566778899'],
            ['nombre' => 'Luis Fernández', 'correo' => 'luis.fernandez@example.com', 'telefono' => '6677889900'],
        ];

        foreach ($usuarios as $usuario) {
            Usuario::create($usuario);
        }

        // Inserta 5 pedidos relacionados con los usuarios
        $pedidos = [
            ['producto' => 'Laptop', 'cantidad' => 1, 'total' => 1200.50, 'id_usuario' => 1],
            ['producto' => 'Smartphone', 'cantidad' => 2, 'total' => 1500.00, 'id_usuario' => 2],
            ['producto' => 'Audífonos', 'cantidad' => 3, 'total' => 300.75, 'id_usuario' => 3],
            ['producto' => 'Monitor', 'cantidad' => 1, 'total' => 500.99, 'id_usuario' => 4],
            ['producto' => 'Teclado', 'cantidad' => 2, 'total' => 100.49, 'id_usuario' => 5],
        ];

        foreach ($pedidos as $pedido) {
            Pedido::create($pedido);
        }

        return response()->json(['message' => 'Registros insertados exitosamente']);
    }

    public function obtenerPedidosConUsuarios()
    {
        // Consulta los pedidos con información de los usuarios relacionados
        $pedidos = Pedido::with('usuario')->get();

        // Formatear los resultados para incluir solo la información necesaria
        $resultado = $pedidos->map(function ($pedido) {
            return [
                'id_pedido' => $pedido->id,
                'producto' => $pedido->producto,
                'cantidad' => $pedido->cantidad,
                'total' => $pedido->total,
                'usuario' => [
                    'nombre' => $pedido->usuario->nombre,
                    'correo' => $pedido->usuario->correo,
                ],
            ];
        });

        return response()->json($resultado);
    }

    public function obtenerPedidosPorRango()
    {
        // Consultar los pedidos cuyo total esté entre 100 y 250
        $pedidos = Pedido::whereBetween('total', [100, 250])->with('usuario')->get();

        // Formatear los resultados
        $resultado = $pedidos->map(function ($pedido) {
            return [
                'id_pedido' => $pedido->id,
                'producto' => $pedido->producto,
                'cantidad' => $pedido->cantidad,
                'total' => $pedido->total,
                'usuario' => [
                    'nombre' => $pedido->usuario->nombre,
                    'correo' => $pedido->usuario->correo,
                ],
            ];
        });

        return response()->json($resultado);
    }

    public function obtenerUsuariosPorLetra()
    {
        // Consultar los usuarios cuyos nombres comiencen con "R"
        $usuarios = Usuario::where('nombre', 'like', 'R%')->get();

        // Formatear los resultados
        $resultado = $usuarios->map(function ($usuario) {
            return [
                'id_usuario' => $usuario->id,
                'nombre' => $usuario->nombre,
                'correo' => $usuario->correo,
                'telefono' => $usuario->telefono,
            ];
        });

        return response()->json($resultado);
    }

    public function contarPedidosPorUsuario($usuarioId = 5)
    {
        // Contar los pedidos asociados al usuario con ID específico
        $totalPedidos = Pedido::where('id_usuario', $usuarioId)->count();

        return response()->json([
            'id_usuario' => $usuarioId,
            'total_pedidos' => $totalPedidos,
        ]);
    }

    public function obtenerPedidosOrdenados()
    {
        // Consultar los pedidos junto con los usuarios, ordenados por el total en forma descendente
        $pedidos = Pedido::with('usuario')->orderBy('total', 'desc')->get();

        // Formatear los resultados
        $resultado = $pedidos->map(function ($pedido) {
            return [
                'id_pedido' => $pedido->id,
                'producto' => $pedido->producto,
                'cantidad' => $pedido->cantidad,
                'total' => $pedido->total,
                'usuario' => [
                    'id_usuario' => $pedido->usuario->id,
                    'nombre' => $pedido->usuario->nombre,
                    'correo' => $pedido->usuario->correo,
                    'telefono' => $pedido->usuario->telefono,
                ],
            ];
        });

        return response()->json($resultado);
    }

    public function obtenerSumaTotalPedidos()
    {
        // Calcular la suma total del campo "total" en la tabla de pedidos
        $sumaTotal = Pedido::sum('total');

        return response()->json([
            'suma_total' => $sumaTotal,
        ]);
    }

    public function obtenerPedidoMasEconomico()
    {
        // Consultar el pedido con el menor total y cargar el usuario asociado
        $pedido = Pedido::with('usuario')->orderBy('total', 'asc')->first();

        // Verificar si hay resultados
        if ($pedido) {
            $resultado = [
                'id_pedido' => $pedido->id,
                'producto' => $pedido->producto,
                'cantidad' => $pedido->cantidad,
                'total' => $pedido->total,
                'usuario' => [
                    'id_usuario' => $pedido->usuario->id,
                    'nombre' => $pedido->usuario->nombre,
                    'correo' => $pedido->usuario->correo,
                    'telefono' => $pedido->usuario->telefono,
                ],
            ];
        } else {
            $resultado = [
                'mensaje' => 'No se encontraron pedidos.',
            ];
        }

        return response()->json($resultado);
    }

    public function obtenerPedidosAgrupadosPorUsuario()
    {
        // Consultar usuarios con sus pedidos
        $usuarios = Usuario::with('pedidos')->get();

        // Formatear los resultados agrupados por usuario
        $resultado = $usuarios->map(function ($usuario) {
            return [
                'id_usuario' => $usuario->id,
                'nombre' => $usuario->nombre,
                'correo' => $usuario->correo,
                'telefono' => $usuario->telefono,
                'pedidos' => $usuario->pedidos->map(function ($pedido) {
                    return [
                        'producto' => $pedido->producto,
                        'cantidad' => $pedido->cantidad,
                        'total' => $pedido->total,
                    ];
                }),
            ];
        });

        return response()->json($resultado);
    }
}

// Melvin Alexander González Ramos
// k00002522
