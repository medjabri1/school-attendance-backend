<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = ['classroom_id', 'level_id', 'subject_id'];

    // LEVEL - SESSION - ONE TO MANY
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // SUBJECT - SESSION - ONE TO MANY
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // CLASSROOM - SESSION - ONE TO MANY
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    // SESSION - ATTENDANCE - ONE TO MANY
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
