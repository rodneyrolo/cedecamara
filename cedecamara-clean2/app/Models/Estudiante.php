<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiante';

    protected $fillable = [
        'nombre',
        'email',
        'carrera',
        'nrocelular',
    ];
	public function informes()
{
    return $this->hasMany(InformePractica::class, 'id_estudiante', 'id_estudiante');
}
}
