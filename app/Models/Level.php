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

    // LEVEL - STUDENT - ONE TO MANY
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // LEVEL - SESSION - ONE TO MANY
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
