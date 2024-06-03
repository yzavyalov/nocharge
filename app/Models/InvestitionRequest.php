<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestitionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'quantity_tokens',
    ];

}
