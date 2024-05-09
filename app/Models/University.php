<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $table = 'university';
    protected $fillable = ['name', 'description', 'location'];

    // Relation avec Ratings
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Relation avec Photos
    public function photos()
    {
        return $this->hasMany(UniversityPhoto::class);
    }

}
