<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoEliminado extends Model
{
    use HasFactory;

    // Especificar la tabla asociada al modelo
    protected $table = 'videos_eliminados';

    // Si no utilizas timestamps (created_at, updated_at), desactiva la gestión automática de ellos
    public $timestamps = false;

    // Permitir asignación masiva en estos campos
    protected $fillable = [
        'video_id', 
        'user_id', 
        'titulo', 
        'descripcion', 
        'url_video', 
        'created_at', 
        'updated_at', 
        'fecha_eliminacion'
    ];
}
