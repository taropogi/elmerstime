<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\CustomResetPasswordNotification;



class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function claimed_rewards_total()
    {
        return $this->claimed_rewards()->sum('stars_used');
    }

    public function available_stars()
    {
        return $this->approvedPhotos->count() - $this->claimed_rewards_total();
    }

    public function claimed_rewards()
    {
        return $this->belongsToMany(Reward::class, 'claimed_rewards')->withTimeStamps();
    }

    public function photos()
    {
        return $this->hasMany(Photo::class)->orderBy('created_at', 'desc');
    }

    public function approvedPhotos()
    {
        return $this->photos()->where('approved', 1);
    }



    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }
}
