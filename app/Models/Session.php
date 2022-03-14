<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = ['salle', 'level_id', 'subject_id'];

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
}
