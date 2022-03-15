<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['session_id', 'student_id'];

    // SESSION - ATTENDACE - ONE TO MANY
    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    // STUDENT - ATTENDANCE - ONE TO MANY
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
