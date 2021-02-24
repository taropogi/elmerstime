<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimedReward extends Model
{

    protected $fillable = [
        'reward_id',
        'stars_used',
        'confirmed'
    ];
    use HasFactory;

    public function claimed_by()
    {
        return $this->belongsTo(User::class);
    }


    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
}
