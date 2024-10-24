<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cargos;

class Empleados extends Model
{
    use HasFactory;

    protected $table = "empleados";

    protected $fillable = [
        "nombre",
        "apellidos",
        "sexo",
        "fecha_ingreso",
        "cargo_id"
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargos::class, 'cargo_id');
    }
}
