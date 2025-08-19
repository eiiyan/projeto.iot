<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sensor extends Model
{
    protected $fillable = [
        'ambiente_id',
        'codigo',
        'tipo',
        'descricao',
        'status'
    ];

    public function registros(){
        return $this->HasMany(Registro::class);
    }

      public function ambiente(){
        return $this->belongsTo(Registro::class);
    }
    use HasFactory;
}
