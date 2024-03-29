<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    // PROFESSOR - SUBJECT - ONE TO MANY
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
