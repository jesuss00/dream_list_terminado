<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public $timestamps = false; // Desactiva los timestamps
    protected $fillable = ['nombre']; // Permitir asignación masiva en el campo 'nombre'
}
