<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Branch;
use App\Models\Kacheri;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_type',
        'name',
        'email',
        'password',
        'mobile_number',
        'address',
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
    ];

    // //Relationship for branch table
    // public function branches()
    // {
    //     return $this->hasMany(Branch::class);
    // }

    // //Relationship for kacheri table
    // public function kacheri()
    // {
    //     return $this->hasOne(Kacheri::class);
    // }


    //This Check If Loged in user is Admin
    public function isAdmin()
    {
        return $this->user_type == 'admin';
    }

    //This Check If Loged in user is User
    public function isUser()
    {
        return $this->user_type == 'user';
    }


}
