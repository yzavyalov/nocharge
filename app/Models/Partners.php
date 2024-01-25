<?php

namespace App\Models;

use App\Enums\TokenTypeEnum;
use Carbon\Carbon;
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

    public function admin()
    {
        return $this->users()->role('user-admin');
    }

    public function token()
    {
        return $this->hasMany(Token::class,'partner_id','id');
    }

    public function currentTocken()
    {
        return $this->hasMany(Token::class,'partner_id','id')->where('active',TokenTypeEnum::ACTIVE);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class,'partner_id','id');
    }

    public function threemonthspayments()
    {
        return $this->hasMany(Payment::class,'partner_id','id')->where('created_at','>',Carbon::now()->subMonth(3));
    }
}
