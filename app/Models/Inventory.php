<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'estado',
        'idcategoria',
    ];
    protected $primaryKey = 'idservicioproducto';
    public $timestamps = false;

    public $search;

    public function updatingSearch() {
        $this->resetPage();
    }

    //Query Scope

    public function scopeNombre($query, $nombre)
    {
        if($nombre)
            return $query->where('nombre', 'LIKE', "%$nombre%")
            ->orwhere('precio', 'LIKE', "%$nombre%")
            ->orwhere('cantidad', 'LIKE', "%$nombre%")
            ->orwhere('descripcion', 'LIKE', "%$nombre%");
    }

    public function scopePrecio($query, $precio)
    {
        if($precio)
            return $query->where('precio', 'LIKE', "%$precio%");
    }
}
