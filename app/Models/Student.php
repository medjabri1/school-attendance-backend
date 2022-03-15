<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'apogee', 'cin', 'cne', 'carte_id', 'level_id'];

    // LEVEL - STUDENT - ONE TO MANY
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // STUDENT - ATTENDANCE - ONE TO MANY
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
