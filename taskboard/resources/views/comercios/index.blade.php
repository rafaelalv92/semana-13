<!DOCTYPE html> 
<html lang="es">
<head> 
    <meta charset="UTF-8"> 
    <title>Comercios afiliados</title> 
</head> 
<body>
  @extends('layouts.app') 
  
@section('titulo', $comercio->nombre_comercio)
@section('contenido') 
    <h1>Comercios afiliados a la pasarela</h1> 
    <form action="{{ route('comercios.index') }}" method="GET"> 
  <input type="text" name="buscar" 
         placeholder="Buscar comercio..." 
         value="{{ request('buscar') }}"> 
  <button type="submit">Buscar</button> 
</form>
    <ul> 
      @forelse ($comercios as $comercio) 
        <li> 
          <a href="/comercios/{{ $comercio->id }}">{{ $comercio->nombre_comercio
}}</a> 
          — {{ $comercio->rubro }} 
          <x-badge-actividad :totalTransacciones="{{ $comercio->transacciones_count }}" />
        </li> 
      @empty 
        <li>Aún no hay comercios afiliados.</li> 
      @endforelse 
    </ul> 
</body>
@endsection
</html>