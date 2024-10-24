<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cargos;
use App\Models\Empleados;

class Aumentos extends Model
{
    use HasFactory;

    protected $table = "aumentos";

    protected $fillable = [
        "fecha",
        "valor",
        "cargo_id",
        "empleado_id"
    ];

    public function cargo() {
        return $this->belongsTo(Cargos::class, 'cargo_id');
    }

    public function empleado() {
        return $this->belongsTo(Empleados::class, 'empleado_id');
    }
}
