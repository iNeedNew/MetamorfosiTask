<?php

namespace App;

use App\Models\PostModel;

class Middleware
{
    // Пользователь авторизован
    public static function userAuth()
    {
        if (!isset($_SESSION['user'])) {
            Core::redirect('/sign-in');
        }
    }

    public static function userIsAuthorPost($postId)
    {
         if (PostModel::getPost($postId)['user_id'] != $_SESSION['user']['id']) {
             Core::showError404();
         }
    }
}