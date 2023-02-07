<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class CreateController extends Controller                          //только вовращает представление куда вносить данные для создания в базе
{
    public function __invoke()                                     ////__invoke для того что бы вызвать эту функцию без обращения к ее имени, можно использовать когда метод в классе только один
    {
        $categories = Category::all();                             //выбирает все записи из базы в переменную

        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }
}
