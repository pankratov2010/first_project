<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class EditController extends Controller                               //только вовращает представление куда вносить данные для редактирования в базе
{
    public function __invoke(Post $post)                              //__invoke для того что бы вызвать эту функцию без обращения к ее имени, можно использовать когда метод в классе только один
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }
}
