<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subproject_id', 'date', 'start_time', 'end_time', 'total_hours'];

    public function subproject()
    {
        return $this->belongsTo(Subproject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
