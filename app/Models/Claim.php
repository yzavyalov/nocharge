<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table='employee_aplications';

    protected $fillable = [
        'user_id',
        'admin_id',
        'status',
        'partner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class,'admin_id','id');
    }
}
