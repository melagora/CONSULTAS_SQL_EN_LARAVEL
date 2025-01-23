<?php
/**
 * Este archivo define el modelo Pedido dentro del espacio de nombres App\Models.
 *
 */
namespace App\Models;

/**
 * Modelo Pedido
 *
 * Este modelo representa la entidad 'Pedido' en la aplicación.
 * Utiliza el trait HasFactory para habilitar la creación de instancias del modelo mediante fábricas.
 * Extiende el modelo base Eloquent proporcionado por Laravel, que ofrece una variedad de
 * métodos para interactuar con la base de datos.
 */

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $fillable = ['producto', 'cantidad', 'total', 'id_usuario'];

    /**
     * Relación con la tabla de usuarios.
     * Un pedido pertenece a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}

// Melvin Alexander González Ramos
// k00002522
