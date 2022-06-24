<?php

namespace App\Controllers\Auth;

use App\Core;
use App\Models\UserModel;

class SignInController
{
    public static function index()
    {
        Core::render('view/signin/index.php', ['title' => 'Вход', 'token' => Core::getCSRFToken()]);
    }

    public static function upload()
    {

        Core::checkCSRFToken($_POST['token']);

        $user = UserModel::getUserByEmail($_POST['email']);

        if (empty($user)) {
            $_SESSION['no_user_found_with_this_email'] = true;
            Core::redirect('/sign-in');
        }
        if ($user['password_hash'] == md5($_POST['password'])) {
            $_SESSION['successfully_authenticated'] = true;
            $_SESSION['user'] = [
                "id" => $user["id"],
                "username" => $user["username"],
                "email" => $user["email"]
            ];
            Core::redirect('/');
        } else {
            $_SESSION['email_or_password_is_incorrect'] = true;
            Core::redirect('/sign-in');
        }
    }
}