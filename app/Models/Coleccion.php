<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at','pivot'];

    public function Cartas(){

    	return $this->belongsToMany(Carta::class,'coleccion');
    }
}
