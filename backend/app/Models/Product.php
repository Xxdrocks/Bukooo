<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        "name",
        "category",
        "image",
        "price",
        "created_by"
    ];


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
