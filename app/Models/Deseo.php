<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios;
use App\Models\Categorias;
use App\Models\Estados;

class Deseo extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'deseo';

    // Campos que pueden ser asignados masivamente
    protected $fillable = ['usuario_id', 'nombre', 'categoria_id', 'estado_id', 'fecha_creacion'];

    // Desactiva timestamps (si no usas created_at y updated_at)
    public $timestamps = false;

    // Relación: Un deseo pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    // Relación: Un deseo puede tener una categoría (opcional)
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    // Relación: Un deseo tiene un estado (Pendiente o Realizado)
    public function estado()
    {
        return $this->belongsTo(Estados::class, 'estado_id');
    }
}
