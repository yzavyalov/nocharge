<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ludoman extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'email',
        'limit',
    ];

    public function ludoTransactions()
    {
        return $this->hasMany(LudomanTransaction::class);
    }
}
