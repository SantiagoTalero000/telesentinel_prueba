<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargos;

class CargosController extends Controller
{
    public function crearCargosView(){
        return view('cargos/crear');
    }

    public function crearCargos(Request $request){
        try {
            $validate = $request->validate([
                "cargo" => 'required',
                "salario" => 'required|numeric'
            ]);

            Cargos::create($validate);

            session()->flash('success', 'Se agrego el cargo exitosamente');

            return redirect()->route('empleados.view');

        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());

            return redirect()->back()->withInput();
        }
    }
}
