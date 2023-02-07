<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class ShowController extends Controller                             //возвращает представление одного поста, в $post попадает все что идет в запросе после http://127.0.0.1:8000/posts/     
{
    public function __invoke(Post $post)                            //__invoke для того что бы вызвать эту функцию без обращения к ее имени, можно использовать когда метод в классе только один
    {
        $category = Category::find($post->category_id);
        $tags = PostTag::where('post_id', $post->id)->get();        //получаю массив из тегов по нужному посту

        //foreach ($tags as $tag) {
        //    dump($tag->tag_id);
        //}

        return view('post.show', compact('post', 'category', 'tags'));  //возвращает представление show. compact - Создаёт массив, содержащий переменные и их значения
    }
}
