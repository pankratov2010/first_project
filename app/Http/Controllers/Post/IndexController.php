<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;
use App\Policies\AdminPolicy;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)                                     //__invoke для того что бы вызвать эту функцию без обращения к ее имени
    {
      
        //$this->authorize('view', auth()->user());
        
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(10);

        //dd($posts);
        // $posts = Post::paginate(10);                                      //all() выбирает все записи из базы в переменную, paginate(10) покажет первые 10

        return view('post.index', compact('posts'));               //возвращает представление index. compact - Создаёт массив, содержащий переменные и их значения
    }
}
