<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;
//Asignación masiva
    protected $fillable = [
      'nombre',
      'imagen'
    ];

    //Relación 1 a muchos Categoria-Producto
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
