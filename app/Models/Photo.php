<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approve()
    {
        $this->approved = 1;
        $this->evaluated = 1;
        $this->approved_at = Carbon::now();
        $this->save();
    }

    public function deny()
    {
        $this->approved = 0;
        $this->evaluated = 1;

        $this->save();
    }
}
