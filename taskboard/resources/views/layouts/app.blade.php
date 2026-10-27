<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <title>@yield('titulo', 'Pasarela de Pagos — TaskBoard')</title> 
</head> 
<body>
    <nav class="barra"> 
  <a href="{{ route('comercios.index') }}">TaskBoard</a> 
  
  @auth 
    <span>Hola, {{ Auth::user()->name }}</span> 
    <form method="POST" action="{{ route('logout') }}" style="display:inline"> 
      @csrf 
      <button type="submit">Salir</button> 
    </form> 
  @endauth 
  
  @guest 
    <a href="{{ route('login') }}">Entrar</a> 
    <a href="{{ route('registro') }}">Registrarse</a> 
  @endguest 
</nav>
    <nav>Pasarela de Pagos · TaskBoard</nav> 
    @if (session('mensaje')) 
  <div class="alerta-exito" style="background:#EAF6EE; 
       color:#1E7E52; padding:0.75rem 1rem; margin:1rem 0; 
       border-radius:8px;"> 
    {{ session('mensaje') }} 
  </div> 
@endif 
    <main> 
        @yield('contenido') 
    </main> 
  
    <footer>&copy; {{ date('Y') }} UPED — Integración de Sistemas</footer>
</body> 
</html> 