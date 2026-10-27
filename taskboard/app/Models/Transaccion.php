<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    protected $fillable = ['comercio_id', 'monto', 'moneda', 'cliente_nombre',
    'metodo_pago', 'estado'];

    public function comercio() 
    { 
        return $this->belongsTo(Comercio::class); 
    }

    public function eventos() 
    { 
        return $this->hasMany(EventoTransaccion::class); 
    } 
}
