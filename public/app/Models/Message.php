<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'text',
        'status',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
