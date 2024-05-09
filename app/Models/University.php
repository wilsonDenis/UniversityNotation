<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    // Dans votre modèle University
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($university) {
            // Cette fonction est appelée juste avant que l'université ne soit supprimée
            $university->photos->each(function ($photo) {
                Storage::delete($photo->path); // Supprime le fichier physique
                $photo->delete(); // Supprime l'enregistrement de la base de données
            });
        });
    }


}
