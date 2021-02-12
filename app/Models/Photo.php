<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        "file_name",
        "description",
    ];

    public function status_alert()
    {
        if ($this->evaluated && $this->approved) {
            return '<span class="badge badge-success">Approved</span>';
        } elseif ($this->evaluated && !$this->approved) {
            return '<span class="badge badge-danger">Denied</span>';
        } else {
            return '<span class="badge badge-warning">Pending</span>';
        }
    }

    public function kid()
    {
        return $this->belongsTo(Kid::class);
    }
}
