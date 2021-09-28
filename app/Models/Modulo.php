<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'idmodulo',
        'module_name',
        'url',
        'icono',
        'padre',
        'status'
    ];

    protected $primaryKey = 'idmodulo';

    // public function permissions()
    // {
    //     return $this->belongsToMany(
    //         Permission::class,
    //         'modulos',
    //         'idmodulo',
    //         'idmodulo',
    //         'idmodulo',
    //         'module_id',
    //     );
    // }

}
