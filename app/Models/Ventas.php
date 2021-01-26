<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];

    public function carta(){
    return $this->belongsTo(carta::class);
    }
}
