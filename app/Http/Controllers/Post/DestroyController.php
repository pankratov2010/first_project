<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class DestroyController extends Controller                           //удаляет объект из базы, не имеет своего представления, реализован в представлении show
{
    public function __invoke(Post $post)                            //__invoke для того что бы вызвать эту функцию без обращения к ее имени, можно использовать когда метод в классе только один
    {
        $post->delete();

        return redirect()->route('post.index');                     //возвращает на основную страницу
    }
}
