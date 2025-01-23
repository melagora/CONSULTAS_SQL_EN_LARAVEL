<?php
/**
 * Este archivo define el modelo Usuario dentro del espacio de nombres App\Models.
 *
 */
namespace App\Models;

/**
 * Modelo Usuario
 *
 * Este modelo representa la entidad 'Usuario' en la aplicación.
 * Utiliza el trait HasFactory para habilitar la creación de instancias del modelo mediante fábricas.
 * Extiende el modelo base Eloquent proporcionado por Laravel, que ofrece una variedad de
 * métodos para interactuar con la base de datos.
 */

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $fillable = ['nombre', 'correo', 'telefono'];

    /**
     * Relación con la tabla de pedidos.
     * Un usuario puede tener muchos pedidos.
     */
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_usuario');
    }
}

// Melvin Alexander González Ramos
// k00002522
