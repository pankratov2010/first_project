<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;
    protected $table = 'posts';
    protected $quarded = false;
    protected $fillable = ['title', 'content', 'description', 'image', 'likes', 'is_published', 'category_id'];


    public function category()
    {
    
        return $this->belongsTo(Category::class, 'category_id', 'id');          //один объект класса Посты принадлежит одному объекту класса Категории 
    
    }

    public function tags()
    {
    
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');          //одному посту принадлежит много тегов
    
    }

}
