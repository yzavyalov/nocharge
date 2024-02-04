<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'sum',
        'currency',
        'status'
    ];

    public function partner()
    {
        return $this->belongsTo(Partners::class,'partner_id','id');
    }
}
