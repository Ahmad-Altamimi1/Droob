<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'type',
        'description',
        'image',
    ];

    public function Article()
    {
        return $this->hasMany(Article::class);
    }
}
