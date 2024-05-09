<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityPhoto extends Model
{
    use HasFactory;
    protected $table = 'university_photos';

    protected $fillable = ['university_id', 'path'];

    public function university()
    {
        return $this->belongsTo(University::class);
    }


}
