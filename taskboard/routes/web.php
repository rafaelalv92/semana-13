<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComercioController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\EventoTransaccionController;
use App\Http\Controllers\AuthController;

Route::prefix('comercios')->name('comercios.')->group(function () { 
  
    Route::get('/', [ComercioController::class, 'index']) 
    ->name('index');
  
    Route::get('/{id}', [ComercioController::class, 'show'])->where('id', '[0-9]+')
    ->name('show');

});

Route::get('/transacciones', [TransaccionController::class, 'index']) 
    ->name('transaccion.index');

Route::get('/eventos-transaccion', [EventoTransaccionController::class, 'index']) 
    ->name('eventos-transaccion.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/proyecto', function () { 
    return [ 
        'nombre' => 'TaskBoard', 
        'ciclo'  => '02-2026', 
    ]; 
});

Route::get('/taskboard', function () { 
    return 'Bienvenido a TaskBoard, tu pasarela de pagos.'; 
});

Route::get('/acerca-de', function () { 
    return 'Taskboard es un controlador de tareas para verificar su avance'; 
});

Route::get('/contacto', function () { 
    return 'Rafael Ernesto Lara Alvarenga - rafael.lara73492@uped.edu.sv'; 
});
  
Route::get('/comercios', [ComercioController::class, 'index'])
    ->name('comercios.index'); 

Route::get('/comercios/{comercio}', [ComercioController::class, 'show'])
    ->name('comercios.show');

Route::get('/practica/formulario-demo', function () { 
    return view('practica.formulario_demo'); 
});

Route::post('/practica/enviar', function () { 
    return 'Formulario recibido correctamente.'; 
}); 
  
Route::get('/comercios/{comercio}/transacciones/nueva', 
    [TransaccionController::class, 'create'] 
)->name('transacciones.create'); 
  
Route::post('/transacciones', 
    [TransaccionController::class, 'store'] 
)->name('transacciones.store');
  
Route::middleware('guest')->group(function () { 
    Route::get('/registro', [AuthController::class, 'mostrarRegistro'])->name('registro'); 
    Route::post('/registro', [AuthController::class, 'registrar'])->name('registro.store'); 
    Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login'); 
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt'); 
}); 
  
Route::middleware('auth')->group(function () { 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 
  
    // ... aquí van TODAS las rutas existentes de comercios y transacciones 
});

Route::post('/login', [AuthController::class, 'login']) 
    ->middleware('throttle:5,1') 
    ->name('login.attempt'); 
/*
Route::get('/comercios', function () { 
    return 'Comercio N1co, BAC Credomatic, Sistema Fedecrédito'; 
});

Route::get('/comercios/{nombre}', function ($nombre='PupuseriaElSalvador') { 
    return '¡Bienvenido a TaskBoard, ' . $nombre . '!'; 
});

Route::get('/comercio/{id}', function ($id) { 
    return "Mostrando el comercio con ID: $id"; 
})->where('id', '[0-9]+'); 

Route::get('/comercios', function () { 
    return 'Listado de comercios afiliados'; 
})->name('comercios.index');

//route('comercios.index');

Route::prefix('comercios')->name('comercios.')->group(function () { 
  
    Route::get('/', function () { 
        return 'Listado de comercios'; 
    })->name('index'); 
  
    Route::get('/{id}', function ($id) { 
        return "Detalle del comercio $id"; 
    })->name('show')->where('id', '[0-9]+'); 
});

Route::get('/comercios', function () { 
    // Simular datos 
    $comercios = [ 
        ['id' => 1, 'nombre' => 'Café Amanecer'], 
        ['id' => 2, 'nombre' => 'Ferretería San José'], 
    ]; 
  
    // Filtrar, validar, ordenar... 
    // ... 30 líneas más de lógica aquí ... 
  
    return $comercios; 
});
*/