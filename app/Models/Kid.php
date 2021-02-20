<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'kid_relationship',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class)->orderBy('created_at', 'desc');
    }

    public function claimed_rewards()
    {
        return $this->hasMany(ClaimedReward::class);
    }

    public function claimed_rewards_total()
    {
        return $this->claimed_rewards->sum('stars_used');
    }

    public function available_stars()
    {
        return $this->approvedPhotos->count() - $this->claimed_rewards_total();
    }

    public function approvedPhotos()
    {
        return $this->photos()->where('approved', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
