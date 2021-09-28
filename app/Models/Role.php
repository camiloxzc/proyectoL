<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'id',
        'name',
        'status',
    ];
    protected $primaryKey = 'id';

    public function scopeName($query, $name)
    {
        if($name)
            return $query->where('name', 'LIKE', "%$name%")
            ->orwhere('id', 'LIKE', "%$name%");
    }
    public function scopeId($query, $id)
    {
        if ($id) {
            return $query->where('name', 'LIKE', "%$id%");
        }
    }
}
