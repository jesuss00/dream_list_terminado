<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Asegúrate de que coincida con tu BD

    protected $fillable = ['id', 'nombre', 'email', 'contraseña']; // Agregar 'id' aquí

    public $timestamps = false; // Si la tabla no tiene created_at y updated_at
}
