<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Cargos;

class EmpleadosController extends Controller
{
    public function indexView(){
        $data = [
            "empleados" => Empleados::with('cargo')->get()
        ];
        return view('home', $data);
    }

    public function crearEmpleadoView(){
        $data = [
            "cargos" => Cargos::all()
        ];
        return view('empleados/crear', $data);
    }

    public function crearEmpleado(Request $request){
        try {
            $validate = $request->validate([
                "nombre" => 'required',
                "apellidos" => "required",
                "sexo" => "required",
                "fecha_ingreso" => "required",
                "cargo_id" => "required",
            ]);

            if(Empleados::where("nombre", $request->nombre)->where("apellidos", $request->apellidos)->where("cargo_id", $request->cargo_id)->exists()){
                session()->flash('error', "El nombre y cargo ya estan registrados");
                return redirect()->back();
            }

            Empleados::create($validate);

            session()->flash('success', 'Se agrego el empleado exitosamente');

            return redirect()->route('empleados.view');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());

            return redirect()->back();
        }
    }

    public function updateEmpleadoView($id){
        $data = [
            "empleado" => Empleados::with('cargo')->where('id', $id)->first(),
            "cargos" => Cargos::all()
        ];
        return view('empleados/empleadoUpdate', $data);
    }

    public function updateEmpleado(Request $request, $id){
        try {
            $validate = $request->validate([
                "nombre" => 'required',
                "apellidos" => "required",
                "sexo" => "required",
                "fecha_ingreso" => "required",
                "cargo_id" => "required",
            ]);

            if(Empleados::where("nombre", $request->nombre)->where("apellidos", $request->apellidos)->where("cargo_id", $request->cargo_id)->exists()){
                session()->flash('error', "El nombre y cargo ya estan registrados");
                return redirect()->back();
            }

            $empleado = Empleados::findOrFail($id);
            $empleado->nombre = $request->nombre;
            $empleado->apellidos = $request->apellidos;
            $empleado->sexo = $request->sexo;
            $empleado->fecha_ingreso = $request->fecha_ingreso;
            $empleado->cargo_id = $request->cargo_id;
            $empleado->update();

            session()->flash('success', 'Se actualizo el empleado exitosamente');

            return redirect()->route('empleados.view');
        } catch (\Throwable $th) {
            session()->flash('error', $e->getMessage());

            return redirect()->back();
        }
    }

    public function deleteEmpleado($id){
        try {
            
            $empleado = Empleados::findOrFail($id);
            $empleado->delete();
            
            session()->flash('success', 'Se elimino el empleado exitosamente');

            return response()->json([
                "status" => "success",
                "message" => "Se elimino correctamente el cliente"
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'Ocurrio un error');

            return response()->json([
                "status" => "error",
                "message" => 'Ocurrio un error'
            ]);
        }

    }
}
