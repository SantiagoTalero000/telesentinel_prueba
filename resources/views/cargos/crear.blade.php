@extends('layouts.layout')

@section('title', 'Creación')


@section('content')
@if (session('error'))
<div class="p-4 mb-4 text-white bg-red-500">
    {{ session('error') }}
</div>
@endif
    <h1 class="my-4 text-4xl font-bold text-center">Crear Cargos</h1>
    <div class="flex justify-center">
    <form method="POST" action="{{ route('crear.cargo') }}" class="grid gap-6 mb-6 grid-cols-1 xl:grid-cols-2 w-[60%] lg:w-[40%]">
        @csrf
        <div class="mx-auto w-80">
            <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900">
                Cargo
            </label>
            <input
                type="text"
                id="cargo"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Nombre del cargo"
                name="cargo"
                required
            />
        </div>
        <div class="mx-auto w-80">
            <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900">
                Salario
            </label>
            <input
                type="number"
                id="salario"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Salario correspondiente al cargo"
                name="salario"
                required
            />
        </div>
       
        <button type="submit" class="col-span-1 py-2 mx-auto text-white bg-blue-500 lg:col-span-2 w-80 rounded-xl">Guardar datos del empleado</button>
    </form>
    </div>
@endsection
