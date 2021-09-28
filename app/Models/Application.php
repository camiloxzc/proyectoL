<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'fechaservicio',
        'precio',
        'idestadoservicio',
        'idusuario',
    ];
    protected $primaryKey = 'idsolicitudservicio';

    public $search;

    public function updatingSearch() {
        $this->resetPage();
    }

    //Query Scope

    public function scopeNombre($query, $nombre)
    {
        if($nombre)
            return $query->where('fechaservicio', 'LIKE', "%$nombre%")
            ->orwhere('precio', 'LIKE', "%$nombre%");
    }
}

