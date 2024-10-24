<nav class="flex items-center justify-between w-full h-12 px-8 text-white bg-blue-950">
    <a href="{{ route('empleados.view') }}" class="text-xl">Telesentinel</a>
    <div class="flex gap-8">
        <a href="{{ route('crear.empleados.view') }}">Crear Empleados</a>
        <a href="{{ route('crear.cargos.view') }}">Crear Cargos</a>
        <a href="{{ route('crear.empleados.view') }}">Historial Salarios</a>
        {{-- <a href="">Actualización</a>
        <a href="">Eliminación</a> --}}
    </div>
</nav>
