<?php

namespace App\Controllers;

use App\Core;
use App\Models\PostModel;
use App\Models\UserModel;

class MainController
{
    public static function index()
    {
        $posts = PostModel::getPosts();
        foreach ($posts as $key => $post) {
            $posts[$key]['user'] = UserModel::getUser($post['user_id']);
            $posts[$key]['tags'] = PostModel::getTags($post['id']);

            $posts[$key]['content'] = substr($post['content'], 0, 320) . '...';

        };
        Core::render('view/main/index.php', ['title' => 'Главная страница', 'posts' => $posts]);
    }
}