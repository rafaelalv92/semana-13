<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{ 
    use HasFactory;
    protected $fillable = ['user_id', 'nombre_comercio', 'rubro', 'fecha_afiliacion'];

    public function transacciones() 
    { 
        return $this->hasMany(Transaccion::class); 
    }
  
public function usuario() 
{ 
    return $this->belongsTo(User::class, 'user_id'); 
}
}
