<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_vs_permission extends Model
{
    use HasFactory;

    protected $table='role_vs_permisos';

    protected $fillable = [
        'id',
        'idRol',
        'idPermiso',
    ];

}
