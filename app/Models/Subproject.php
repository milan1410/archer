<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subproject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function timeLogs()
    {
        return $this->hasMany(TimeLog::class);
    }

}
