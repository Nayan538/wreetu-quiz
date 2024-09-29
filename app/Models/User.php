<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\AccessControl\CompanyInfo;
use App\Models\AccessControl\Role;
use Modules\HRMS\Models\Employee;
use App\Models\AccessControl\Branch;
use App\Models\Notifications\GeneralNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'branch_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function generalNotifications()
    {
        return $this->belongsToMany(GeneralNotification::class, 'user_general_notification', 'user_id', 'general_notification_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function company(){
        $company = CompanyInfo::first();
        return $company;
     }


     // Add methods required by JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
           
        ];
    }
}
