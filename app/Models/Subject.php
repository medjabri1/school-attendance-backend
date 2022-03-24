<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'level_id', 'professor_id'];

    // LEVEL - SUBJECT - ONE TO MANY
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // PROFESSOR - SUBJECT - ONE TO MANY
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    // SUBJECT - SESSION - ONE TO MANY
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
