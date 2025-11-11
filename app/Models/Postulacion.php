<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = 'postulaciones';
    protected $primaryKey = 'id_postulacion';

    protected $fillable = [
        'id_estudiante',
        'id_oferta',
        'fecha_postulacion',
        'estado',
        'comentario'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante', 'id_estudiante');
    }

    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'id_oferta', 'id_oferta');
    }
}

