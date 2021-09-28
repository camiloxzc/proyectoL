<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailShopping extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'precio',
        'idcompra',
        'idservicioproducto',
    ];
    protected $primaryKey = 'idcompra';
}
