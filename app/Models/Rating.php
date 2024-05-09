<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = ['university_id', 'critere_id', 'user_id', 'score'];

    // Relations
    public function university()
    {
        return $this->belongsTo(University::class);
    }

  

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
