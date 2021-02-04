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
        return $this->hasMany(Photo::class);
    }

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
