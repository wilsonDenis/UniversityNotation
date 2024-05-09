<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critere extends Model
{
    use HasFactory;
    protected $table= 'critere';
    protected $fillable = ['name', 'description'];

    // Relation avec Ratings
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
