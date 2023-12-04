<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];

    protected $guard = 'partner';

    public function users()
    {
        return $this->belongsToMany(User::class,'partners_users','partner_id','user_id');
    }
}
