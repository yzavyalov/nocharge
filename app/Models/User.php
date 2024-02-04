<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
=======
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
>>>>>>> 2c834df24b0f0b6f1633d56f1315cd3c697d6124

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
<<<<<<< HEAD
=======
        'two_factor_recovery_codes',
        'two_factor_secret',
>>>>>>> 2c834df24b0f0b6f1633d56f1315cd3c697d6124
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
<<<<<<< HEAD
        'password' => 'hashed',
    ];
=======
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

    public function messages()
    {
        return $this->hasMany(Message::class,'user_id','id');
    }

>>>>>>> 2c834df24b0f0b6f1633d56f1315cd3c697d6124
}
