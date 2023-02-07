<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class UpdateController extends BaseController                            //обновляет в базе ранее внесенные в представление данные, не имеет своего представления
{
    public function __invoke(UpdateRequest $request, Post $post)    //__invoke для того что бы вызвать эту функцию без обращения к ее имени, можно использовать когда метод в классе только один                  
    {                                                                                       

        $data = $request->validated();                             //сохраняю в data провалидированный запрос

        $this->service->update($post, $data);                      //отправляю запрос в функцию update класса Service
        
        return redirect()->route('post.show', $post->id);           //возвращает на страницу с обновленным постом
    }
}