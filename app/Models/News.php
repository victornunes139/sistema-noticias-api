<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'caption', 'body', 'media', 'user_id', 'type_id'];

    public function news()
    {
        return $this->belongsTo(NewsType::class, 'type_id');
    }
}
