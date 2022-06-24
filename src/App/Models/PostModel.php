<?php

namespace App\Models;

use App\DB;

class PostModel
{
    public static function getPost($id)
    {
        $db = new DB();
        return $db->query('SELECT * FROM `posts` WHERE id = :id', ["id" => $id])[0];
    }

    public static function getTags($id)
    {
        $db = new DB();
        return $db->query('SELECT * FROM tags JOIN posts_tags ON tags.id = posts_tags.tag_id where posts_tags.post_id = :id', ["id" => $id]);
    }

    public static function addPost($data)
    {
        $db = new DB();
        $db->query('INSERT INTO `posts` (title, user_id, content, image) VALUES (:title, :user_id, :content, :image)', [
            "title" => $data["title"],
            "user_id" => $data["user_id"],
            "content" => $data["content"],
            "image" => $data["image"]
        ]);
        return $db->query("SELECT LAST_INSERT_ID()");
    }

    public static function getPosts()
    {
        $db = new DB();
        return $db->query('SELECT * FROM `posts`');
    }

    public static function deletePost($id)
    {
        $db = new DB();
        return $db->query('DELETE FROM `posts` WHERE id=:id;', ["id" => $id])[0];
    }

    public static function updatePost($data)
    {
        $db = new DB();
        return $db->query('UPDATE `posts` SET title = :title, content = :content, image = :image WHERE id = :id', [
            "id" => $data['id'],
            "title" => $data['title'],
            "content" => $data['content'],
            "image" => $data['image']
        ])[0];
    }

}