<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'caption', 'body', 'media', 'user_id', 'type_id'];

    protected static function booted()
    {
        static::addGlobalScope('ownNews', function (Builder $builder) {
            $builder->where('user_id', Auth()->id());
        });
    }

    public function news()
    {
        return $this->belongsTo(NewsType::class, 'type_id');
    }
}
