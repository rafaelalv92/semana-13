@props(['estado']) 
  
@if ($estado === 'Completada') 
    <span class="badge verde">✔ {{ $estado }}</span> 
@elseif ($estado === 'Fallida') 
    <span class="badge rojo">✗ {{ $estado }}</span> 
@else 
    <span class="badge amarillo">⏳ {{ $estado }}</span> 
@endif 
