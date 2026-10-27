<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Models\Comercio;
use Illuminate\View\View;
use App\Http\Requests\GuardarTransaccionRequest;
use Illuminate\Support\Facades\Auth;

class TransaccionController extends Controller
{


    public function index() 
    { 
    return Transaccion::with('comercio')->get(); 
    }

    private function autorizar(Transaccion $t): void 
{ 
    abort_unless($t->comercio->user_id === Auth::id(), 404); 
} 
  
public function edit(Transaccion $transaccion) 
{ 
    $this->autorizar($transaccion); 
    $comercios = Auth::user()->comercios()->orderBy('nombre_comercio')->get(); 
    return view('transacciones.edit', compact('transaccion', 'comercios')); 
} 

    public function create(Comercio $comercio): View 
{ 
    $comercio = Auth::user()->comercios()->orderBy('nombre_comercio')->get(); 
    return view('transacciones.create', compact('comercio')); 
}  
  
public function store(GuardarTransaccionRequest $request)  
{ 
       $request->validate([
    'comercio_id' => 'required|exists:comercios,id', 
    'cliente_nombre' => 'required|string|max:255', 
    'monto' => 'required|numeric|min:0.01', 
], [ 
    'cliente_nombre.required' => 'Debes indicar el nombre del cliente.', 
    'monto.required' => 'Debes indicar un monto.', 
    'monto.numeric' => 'El monto debe ser un número.', 
    'monto.min' => 'El monto debe ser mayor a cero.', 
]);  

        $transaccion = Transaccion::create($request->only([ 
        'comercio_id', 'cliente_nombre', 'monto', 
        ])); 
  
        return redirect() 
        ->route('comercios.show', $transaccion->comercio_id) 
        ->with('mensaje', 'Transacción registrada con éxito.');
} 
public function show(Transaccion $transaccion) 
    { 
    return $transaccion->load('comercios'); 
    }
}
