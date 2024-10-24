@extends('layouts.layout')

@section('title', 'Historial Salarios')

@section('content')
    @if (session('success'))
        <div class="p-4 mb-4 text-white bg-green-500">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="my-4 text-4xl font-bold text-center">Historial Salarios</h1>

    <div class="flex justify-center w-full">
        <a href="{{ route('aumento.update', $id) }}" class="px-4 py-2 text-white bg-green-500 rounded-xl">Realizar Aumento</a>
    </div>


    <div class="xl:w-[50%] h-[70vh] overflow-auto mx-auto">
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
            <thead class="text-xs text-white uppercase bg-blue-950">
              <tr>
                <th
                  scope="col"
                  class="px-4 py-2 text-xl font-medium text-center border-8 border-white"
                >
                  Fecha
                </th>
                <th
                  scope="col"
                  class="px-4 py-2 text-xl font-medium text-center border-8 border-white"
                >
                  Valor
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
                  Empleado
                </th>
              </tr>
            </thead>
            <tbody>
            @foreach ($aumentos as $aumento)
            <tr
                key={{ $aumento->id }}
                class="bg-white border-b border-blue-950"
            >
                <td
                    scope="row"
                    class="px-6 py-1 text-lg text-black whitespace-nowrap"
                >
                    {{ $aumento->fecha }}
                </td>
                <td class="px-6 py-1 text-lg text-black">
                    {{ number_format($aumento->valor, 0, ',', '.') }}
                </td>
                <td class="flex justify-between gap-4 px-6 py-1 text-lg text-black">
                    {{ $aumento->cargo->cargo }}
                </td>
                <td class="px-6 py-1 text-lg text-black">
                    {{ $aumento->empleado->nombre." ".$aumento->empleado->apellidos }}
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>

@endsection
