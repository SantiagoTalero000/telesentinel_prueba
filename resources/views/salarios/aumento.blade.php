@extends('layouts.layout')

@section('title', 'Aumentos')

@section('content')
    @if (session('error'))
        <div class="p-4 mb-4 text-white bg-green-500">
            {{ session('error') }}
        </div>
    @endif
    <h1 class="my-4 text-4xl font-bold text-center">Aumento Salarios</h1>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('generar.aumento', $id) }}" class="grid gap-6 mb-6 grid-cols-1 xl:grid-cols-2 w-[60%] lg:w-[40%]">
            @csrf
            <div class="mx-auto w-80">
                <label for="valor" class="block mb-2 text-sm font-medium text-gray-900">
                    Valor
                </label>
                <input
                    type="number"
                    id="valor"
                    value="{{ intval($valorActual->valor) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Nombre del empleado"
                    name="valor"
                    required
                />
            </div>
            <button type="submit" class="col-span-1 py-2 mx-auto text-white bg-blue-500 lg:col-span-2 w-80 rounded-xl">
                Realizar Aumento
            </button>
        </form>
    </div>

@endsection

