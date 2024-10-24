<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aumentos;
use App\Models\Empleados;
use Carbon\Carbon;

class HistorialController extends Controller
{
    public function historialSalariosView($id){
        $data = [
            "id" => $id,
            "aumentos" => Aumentos::with('cargo')->with('empleado')->where('empleado_id', $id)->latest()->get()
        ];
        return view('salarios/historial', $data);
    }

    public function aumentoUpdateView($id){
        $data = [
            "valorActual" => Aumentos::where('empleado_id', $id)->latest()->first(),
            "id" => $id
        ];
        return view('salarios/aumento', $data);
    }

    public function aumentoUpdate(Request $request, $id){
        try {
            $request->validate([
                "valor" => 'required|integer'
            ]);

            $cargo = Empleados::where('id', $id)->value('cargo_id');

            Aumentos::create([
                "fecha" => Carbon::now(),
                "valor" => $request->valor,
                "cargo_id" => $cargo,
                "empleado_id" => $id
            ]);

            session()->flash('success', 'Se genero el aumento exitosamente');

            return redirect()->route('historial.salarios', $id);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());

            return redirect()->back();
        }
    }
}
