<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventoTransaccion;

class EventoTransaccionController extends Controller 
{ 
    public function index() 
    { 
    return EventoTransaccion::with('transacciones')->get(); 
    }


public function show(EventoTransaccion $eventos) 
    { 
    return $eventos->load('transacciones'); 
    }
} 
