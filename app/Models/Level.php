<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['filiere_id', 'libelle'];

    // FILIERE - LEVEL - ONE TO MANY
    public function filiere()
    {
        return $this->belongsTo(filiere::class);
    }

    // LEVEL - SUBJECT - ONE TO MANY
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
