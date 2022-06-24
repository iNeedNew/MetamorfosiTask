<?php

namespace App\Models;

use App\DB;

class TagModel
{
    public static function getTag($id)
    {
        $db = new DB();
        return $db->query('SELECT * FROM `tags` WHERE id = :id', ["id" => $id])[0];
    }

    public static function getPosts($id)
    {
        $db = new DB();
        return $db->query('SELECT * FROM posts JOIN posts_tags ON posts.id = posts_tags.post_id where posts_tags.tag_id = :id', ["id" => $id]);
    }

    public static function getTags()
    {
        $db = new DB();
        return $db->query('SELECT * FROM `tags`');
    }

    public static function addTag($data)
    {
        $db = new DB();
        return $db->query('INSERT INTO `tags` (title) VALUES (:title)', [
            "title" => $data["title"],
        ]);
    }

    public static function updateTag($data)
    {
        $db = new DB();
        return $db->query('UPDATE `tags` SET title = :title WHERE id = :id', [
            "id" => $data['id'],
            "title" => $data['title'],
        ])[0];
    }

    public static function deleteTag($id)
    {
        $db = new DB();
        return $db->query('DELETE FROM `tags` WHERE id = :id;', ["id" => $id])[0];
    }

}