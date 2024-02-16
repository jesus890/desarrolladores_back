<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desarrolladores extends Model
{
    use HasFactory;

    protected $table = 'desarrolladores';

    protected $fillable = [
      'id',
      'nombre',
      'edad',
      'habilidades'
    ];

}
