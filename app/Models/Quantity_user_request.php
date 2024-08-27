<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity_user_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'partner_id',
        'check_user_id',
        'type',
        'quantity',
    ];
}
