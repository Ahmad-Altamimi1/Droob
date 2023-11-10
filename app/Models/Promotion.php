<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'articleId',
        'userId',
        'video',
        'image',
    ];
    public function Article()
    {
        return $this->belongsTo(Article::class);
    }
}
