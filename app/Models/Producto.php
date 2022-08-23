<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'categoria_id',
        'descripcion',
        'precio',
        'stock',
        'imagen'
    ];

    //Relación 1 a muchos inversa Categoria-Producto
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
