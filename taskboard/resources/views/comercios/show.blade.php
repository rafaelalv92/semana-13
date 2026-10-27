<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <title>{{ $comercio->nombre_comercio }}</title> 
</head> 
<body>
    @extends('layouts.app') 
  
@section('titulo', $comercio->nombre_comercio) 
  
@section('contenido') 
    <h1>{{ $comercio->nombre_comercio }}</h1>
    <a href="{{ route('transacciones.create', $comercio) }}"> 
    + Nueva transacción 
    </a> 
    <p>Rubro: {{ $comercio->rubro }}</p> 
  
    <h2>Transacciones</h2> 
    @forelse ($comercio->transacciones as $transaccion) 
    <div class="transaccion"> 
        <strong>${{ $transaccion->monto }} {{ $transaccion->moneda }}</strong> 
        — {{ $transaccion->cliente_nombre }} 
        <x-badge-estado :estado="$transaccion->estado" /> 
    </div>
        @if ($comercio->transacciones->count() === 0) 
            <p>Este comercio aún no registra transacciones.</p> 
        @elseif ($comercio->transacciones->count() === 1) 
            <p>Este comercio tiene su primera transacción registrada.</p> 
        @else 
            <p>Este comercio tiene un historial de {{ $transaccion->count() }}
            transacciones.</p> 
        @endif
    @empty 
    <p>Este comercio aún no registra transacciones.</p> 
    @endforelse 
    </body>
@endsection



</html>