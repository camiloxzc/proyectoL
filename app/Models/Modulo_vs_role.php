<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo_vs_role extends Model
{
    use HasFactory;

    protected $table = 'modulo_vs_role';

    protected $fillable = [
        'id',
        'idModulo',
        'idRol',
    ];
}
