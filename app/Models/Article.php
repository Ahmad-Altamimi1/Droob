<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'description',
        'userId',
        'typeId',
        'image1',
        'image2',
        'image3'
    ];

    public function articleType()
    {
        return $this->belongsTo(ArticleType::class,'typeId');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    // public function Image()
    // {
    //     return $this->hasMany(Image::class);
    // }
    public function Image()
    {
        return $this->hasMany(Image::class, 'articleId'); // Assuming your foreign key is 'articleId'
    }
    public function Promotion()
    {
        return $this->hasMany(Promotion::class, 'articleId');
    }
}
