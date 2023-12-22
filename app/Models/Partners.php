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

    public function token()
    {
        return $this->hasMany(Token::class,'partner_id','id');
    }

    public function currentTocken()
    {
        return $this->hasMany(Token::class,'partner_id','id')->where('active',1);
    }
}
