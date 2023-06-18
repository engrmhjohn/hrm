<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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

    public function designation()
    {
        return $this->hasOne(Designation::class,'id','designation_id');
    }
    public function department()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }
    public function paySlip()
    {
        return $this->hasOne(PaySlip::class,'id','pay_slip_id');
    }
    public function shift()
    {
        return $this->hasOne(Shift::class,'id','shift_id');
    }
    public function location()
    {
        return $this->hasOne(Location::class,'id','location_id');
    }
}
