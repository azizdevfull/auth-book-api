<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Image extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['imageable_id', 'imageable_type', 'path'];

    public function user()

    {
        return $this->belongsTo(User::class);
    }
}
