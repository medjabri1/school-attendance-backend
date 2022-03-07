<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'level_id'];

    // LEVEL - SUBJECT - ONE TO MANY
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
