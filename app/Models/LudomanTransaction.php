<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LudomanTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ludomen_id',
        'sum',
        'status',
    ];

    public function ludoman()
    {
        return $this->belongsTo(Ludoman::class);
    }
}
