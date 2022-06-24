<?php

namespace App\Models;

use App\DB;

class PostTagModel
{
    public static function addRow($data)
    {
        $db = new DB();
        return $db->query('INSERT INTO `posts_tags` (post_id, tag_id) VALUES (:post_id, :tag_id)', [
            "post_id" => $data["post_id"],
            "tag_id" => $data["tag_id"],
        ]);
    }

    public static function getRowsByPostId($post_id)
    {
        $db = new DB();
        return $db->query('SELECT * FROM `posts_tags` WHERE post_id = :post_id', [
            "post_id" => $post_id,
        ]);
    }

    public static function deleteRowsByPostId($post_id)
    {
        $db = new DB();
        return $db->query('DELETE FROM `posts_tags` WHERE post_id=:id;', ["id" => $post_id])[0];
    }


}