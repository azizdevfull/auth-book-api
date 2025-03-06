<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Book extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'description',
        'author_id'
    ];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
