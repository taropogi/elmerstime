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
