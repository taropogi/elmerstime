<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Reward extends Model
{

    protected $fillable = [
        'title',
        'description',
        'stars_required',
    ];

    use HasFactory;




    public function claimed_rewards()
    {
        return $this->belongsToMany(Reward::class, 'claimed_rewards')->withTimeStamps();
    }
}
