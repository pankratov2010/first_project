<?php

namespace App\Services\Post;


use App\Models\Post;
use App\Models\PostTag;

class Service
{
    public function store($data)                                   //ф-я создания поста
    {
        $tags = $data['tags'];                                     //теги в отдельную переменную из $data
        
        unset($data['tags']);                                      //убираю теги из $data

        $post = Post::create($data);                               //заполняет таблицу Post из массива $data

        //$post->tags()->attach($tags);                     //альтернативный вариант, заполнения таблицы post_tags, работает через вызов public function tags в модели Post, при этом в таблицу не вносятся данные когда заполнено

        //заполняю таблицу post_tags
        foreach ($tags as $tag) {                                  //прохожу циклом по $tags
            PostTag::firstOrCreate([       //заполняю таблицу, проверяю на уникальность перед добавлением в таблицу, точно надо проверять при редактировании
                'tag_id' => $tag,
                'post_id' => $post->id,
            ]);
        }

        return $post;
    }

    public function update($post, $data)                                       //ф-я обновления поста
    {
        $tags = $data['tags'];                                     //теги в отдельную переменную из $data
        unset($data['tags']);                                      //убираю теги из $data

        $post->update($data);                                       //обновляет таблицу posts данными из массива

        $post->tags()->sync($tags);                            //редактирует таблицу post_tags, работает через вызов public function tags в модели Post, работает по принципу attach
    
        return $post->fresh();
    }

}
