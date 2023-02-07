<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class StoreController extends BaseController                            //помещает/создает в базе ранее внесенные в представление данные, не имеет своего представления
{                                                                   //__invoke для того что бы вызвать эту функцию без обращения к ее имени, можно использовать когда метод в классе только один
    public function __invoke(StoreRequest $request)                 //обращается к классу StoreRequest, и возвращает из него $request
    {

        $data = $request->validated();                             //сохраняю в data провалидированный запрос
        
        $this->service->store($data);                              //отправляю запрос в функцию store класса Service
        
        return redirect()->route('post.index');                    //возвращает на главную страницу    

    }
}