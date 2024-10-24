@extends('layouts.layout')

@section('title', 'Actualizar Empleado')

@section('content')

@if (session('error'))
<div class="p-4 mb-4 text-white bg-red-500">
    {{ session('error') }}
</div>
@endif
<h1 class="my-4 text-4xl font-bold text-center">Actualizar Empleado</h1>
<div class="flex justify-center">
<form method="POST" action="{{ route("update.empleado", $empleado->id) }}" class="grid gap-6 mb-6 grid-cols-1 xl:grid-cols-2 w-[60%] lg:w-[40%]">
    @method("PUT")
    @csrf
    <div class="mx-auto w-80">
        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">
            Nombre
        </label>
        <input
            type="text"
            id="nombre"
            value="{{ $empleado->nombre }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Nombre del empleado"
            name="nombre"
            required
        />
    </div>
    <div class="mx-auto w-80">
        <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900">
            Apellido
        </label>
        <input
            type="text"
            id="apellido"
            value="{{ $empleado->apellidos }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Apellido del empleado"
            name="apellidos"
            required
        />
    </div>
    <div class="mx-auto w-80">
        <label for="sexo" class="block mb-2 text-sm font-medium text-gray-900">
            Sexo
        </label>
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            id="sexo"
            name="sexo"
            required
        >
            <option value="" disabled>Seleccione una opción...</option>
            <option {{ ("F" == $empleado->sexo) ? 'selected': '' }} value="F">Femenino</option>
            <option {{ ("M" == $empleado->sexo) ? 'selected': '' }} value="M">Masculino</option>
        </select>
    </div>
    <div class="mx-auto w-80">
        <label for="fecha_ingreso" class="block mb-2 text-sm font-medium text-gray-900">
            Fecha Ingreso
        </label>
        <input
            type="date"
            id="fecha_ingreso"
            value="{{ $empleado->fecha_ingreso }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Apellido del empleado"
            name="fecha_ingreso"
            required
        />
    </div>
    <div class="col-span-1 mx-auto lg:col-span-2 w-80">
        <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900">
            Cargo
        </label>
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            id="cargo"
            name="cargo_id"
            required
        >
            <option value="" selected disabled>Seleccione una opción...</option>
            @foreach ($cargos as $cargo)
                <option 
                    value="{{ $cargo->id }}"
                    {{ ($cargo->id == $empleado->cargo_id) ? 'selected': '' }}
                >
                    {{ $cargo->cargo }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="col-span-1 py-2 mx-auto text-white bg-blue-500 lg:col-span-2 w-80 rounded-xl">
        Actualizar los datos del empleado
    </button>
</form>
</div>

@endsection