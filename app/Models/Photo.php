<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        "file_name"
    ];

    public function status_alert()
    {
        if ($this->approved) {
            return '<span class="badge badge-success">Approved</span>';
        } else {
            return '<span class="badge badge-warning">Pending</span>';
        }
    }
}
