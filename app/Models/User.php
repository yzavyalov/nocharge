<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\EmployeeApplicationStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use function Termwind\renderUsing;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function partners()
    {
        return $this->belongsToMany(Partners::class,'partners_users','user_id','partner_id' );
    }

    public function claims()
    {
        return $this->hasMany(Claim::class,'user_id','id');
    }

    public function activeClaim()
    {
        return $this->hasMany(Claim::class,'user_id','id')->where('status',EmployeeApplicationStatusEnum::AGREED)->latest('created_at');
    }

    public function lastClaim()
    {
        return $this->hasOne(Claim::query()->latest('created_at')->first());
    }

    public function claimForMe()
    {
        return $this->hasMany(Claim::class,'admin_id','id');
    }

}
