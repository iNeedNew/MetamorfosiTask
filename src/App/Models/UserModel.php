<?php

namespace App\Models;

use App\DB;

class UserModel
{

    public static function getUser($id)
    {
        $db = new DB();
        return $db->query('SELECT * FROM `users` WHERE id = :id', ["id" => $id])[0];
    }

    public static function getUserByEmail($email)
    {
        $db = new DB();
        return $db->query('SELECT * FROM `users` WHERE email = :email', ["email" => $email])[0];
    }

    public static function getUsers()
    {
        $db = new DB();
        return $db->query('SELECT * FROM `users`');
    }

    public static function addUser($data)
    {
        $db = new DB();
        return $db->query('INSERT INTO `users` (username, email, password_hash) VALUES (:username, :email, :password_hash)', [
            "username" => $data["username"],
            "email" => $data["email"],
            "password_hash" => $data["password_hash"]
        ]);
    }
}