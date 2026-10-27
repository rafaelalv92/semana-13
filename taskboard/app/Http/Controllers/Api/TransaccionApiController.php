<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Http\Resources\TransaccionResource;
use App\Http\Requests\StoreTransaccionRequest;

class TransaccionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    { 
    return TransaccionResource::collection( 
        Transaccion::latest()->get()); 
    } 
  
    public function show(Transaccion $transaccion) 
    { 
    return new TransaccionResource($transaccion); 
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaccionRequest $request) 
{ 
    $transaccion = Transaccion::create($request->validated()); 
  
    return (new TransaccionResource($transaccion)) 
        ->response() 
        ->setStatusCode(201); 
} 
  
public function destroy(Transaccion $transaccion) 
{ 
    $transaccion->delete(); 
  
    return response()->noContent();   // 204 
} 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
