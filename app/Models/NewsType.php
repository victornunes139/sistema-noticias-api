<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;

class NewsType extends Model
{
    use HasFactory;

    protected $table = 'news_type';

    protected $fillable = ['name', 'user_id'];

    protected static function booted()
    {
        static::addGlobalScope('ownTypes', function (Builder $builder) {
            $builder->where('user_id', Auth()->id());
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->hasMany(News::class, 'type_id');
    }
}
