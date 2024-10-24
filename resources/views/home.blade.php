@extends('layouts.layout')

@section('title', 'Inicio')


@section('content')
    @if (session('success'))
        <div class="p-4 mb-4 text-white bg-green-500">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="p-4 mb-4 text-white bg-red-500">
            {{ session('error') }}
        </div>
    @endif
    @csrf
    <h1 class="my-4 text-4xl font-bold text-center">Empleados</h1>
    <div class="xl:w-[60%] h-[70vh] overflow-auto mx-auto">
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
            <thead class="text-xs text-white uppercase bg-blue-950">
              <tr>
                <th
                  scope="col"
                  class="px-4 py-2 text-xl font-medium text-center border-8 border-white"
                >
                 ID
                </th>
                <th
                  scope="col"
                  class="px-4 py-2 text-xl font-medium text-center border-8 border-white"
                >
                  Nombre
                </th>
                <th
                  scope="col"
                  class="px-4 py-2 text-xl font-medium text-center border-8 border-white"
                >
                  Sexo
                </th>
                <th
                  scope="col"
                  class="px-4 py-2 text-xl font-medium text-center border-8 border-white"
                >
                  Fecha Ingreso
                </th>
                <th
                  scope="col"
                  class="px-4 py-2 text-xl font-medium text-center border-8 border-white"
                >
                  Cargo
                </th>
                <th
                  scope="col"
                  class="px-4 py-2 text-xl font-medium text-center border-8 border-white"
                >
                  Salario
                </th>
                <th
                  scope="col"
                  class="px-4 py-2 text-xl font-medium text-center border-8 border-white"
                >
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody>
            @foreach ($empleados as $empleado)
            <tr
                key={{ $empleado->id }}
                class="bg-white border-b border-blue-950"
            >
                <td
                    scope="row"
                    class="px-6 py-1 text-lg text-black whitespace-nowrap"
                >
                    {{ $empleado->empleado->id }}
                </td>
                <td
                    scope="row"
                    class="px-6 py-1 text-lg text-black whitespace-nowrap"
                >
                    {{ $empleado->empleado->nombre . " " . $empleado->empleado->apellidos }}
                </td>
                <td class="px-6 py-1 text-lg text-black">
                    {{ $empleado->empleado->sexo }}
                </td>
                <td class="flex justify-between gap-4 px-6 py-1 text-lg text-black">
                    {{ $empleado->empleado->fecha_ingreso }}
                </td>
                <td class="px-6 py-1 text-lg text-black">
                    {{ $empleado->cargo->cargo }}
                </td>
                <td class="px-6 py-1 text-lg text-black">
                    {{ number_format($empleado->valor, 0, ',', '.') }}
                </td>
                <td class="flex gap-2 px-6 py-1 text-black text-md">
                    <a href="{{ route('update.empleado.view', $empleado->empleado->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded-xl">Editar</a>
                    <button onclick="deleteEmpleado({{ $empleado->empleado->id }})" class="px-4 py-2 text-white bg-red-500 rounded-xl">Eliminar</button>
                    <a href="{{ route('historial.salarios', $empleado->empleado->id) }}" class="px-4 py-2 text-white bg-yellow-500 rounded-xl">Historial</a>
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <script>
        const deleteEmpleado = async (id) =>{
            try {
                const token = document.getElementsByName('_token')[0].value
                const eliminar = window.confirm(`¿Seguro desea eliminar el id ${id}?`)

                if(eliminar){
                    const response = await fetch(`/empleados/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': token,
                        }
                    });

                    location.reload()
                }

            } catch (error) {
                console.error(error)
            }
        }
      </script>
@endsection
