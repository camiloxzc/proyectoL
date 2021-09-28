<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calendar extends Model
{
    use HasFactory;

    static $rules=[
        'user_id'=>'required',
        'start'=>'required',
        'end'=>'required',
        'startHour'=>'required',
        'endHour'=>'required',
    ];
    protected $fillable=[
        'user_id',
        'inventory_id',
        'start',
        'end',
        'startHour',
        'endHour'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
