<?php

namespace App\Controllers\Auth;

use App\Core;
use App\Models\UserModel;

class SignUpController
{
    public static function index()
    {
        Core::render('view/signup/index.php', ['title' => 'Регестрация', 'token' => Core::getCSRFToken()]);
    }

    public static function upload()
    {
        Core::checkCSRFToken($_POST['token']);

        $danger = false;
        if (UserModel::getUserByEmail($_POST["email"])) {

            $_SESSION['email_already_in_use'] = true;
            $danger = true;
        }
        if ($_POST["password"] != $_POST["password_confirmed"]) {
            $_SESSION['password_does_not_match_confirmation_password'] = true;
            $danger = true;
        }

        if ($danger) {
            Core::redirect('/sign-up');
        }

        UserModel::addUser([
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password_hash" => md5($_POST["password"])
        ]);
        Core::redirect('/sign-in');
    }
}