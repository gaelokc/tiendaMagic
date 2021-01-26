<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at','pivot'];

    public function coleccion){

    	return $this->belongsToMany(coleccion::class,'nombre_coleccion');
    }
    public function ventas){

    	return $this->belongsTo(ventas::class,'id');

    }public function compras){

    	return $this->belongsTo(compras::class,'id');
    }
}
