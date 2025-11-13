<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformePractica extends Model
{
    use HasFactory;

    protected $table = 'informe_practica';
    protected $primaryKey = 'id_informe';

    protected $fillable = [
        'id_estudiante',
        'id_oferta',
        'fecha_entrega',
        'calificacion',
        'comentarios'
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
