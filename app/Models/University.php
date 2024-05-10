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

   
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function photos()
    {
        return $this->hasMany(UniversityPhoto::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($university) {

            $university->photos->each(function ($photo) {
                Storage::delete($photo->path); 
                $photo->delete(); 
            });
        });
    }


}
