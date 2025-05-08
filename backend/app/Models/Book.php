<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'user_id',
        'title',
        'author',
        'cover_image',
        'current_page',
        'is_reading',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
