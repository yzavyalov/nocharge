<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'token',
        'active',
        'finish_date',
    ];

    public function partner()
    {
        return $this->belongsTo(Partners::class);
    }
}
