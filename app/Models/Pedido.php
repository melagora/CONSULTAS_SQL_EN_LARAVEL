<?php

namespace App\Models;

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
