<?php

namespace App\Controllers;

use App\Core;
use App\Middleware;
use App\Models\PostModel;
use App\Models\PostTagModel;
use App\Models\TagModel;
use App\Models\UserModel;
use DateTime;

class PostController
{

    public static function show($values)
    {
        $id = $values[0];
        $post = PostModel::getPost($id);
        $post['user'] = UserModel::getUser($post['user_id']);
        $tags = PostModel::getTags($id);
        Core::render('view/post/show.php', ['title' => $post['title'], 'post' => $post, 'tags' => $tags]);
    }

    public static function create()
    {
        Middleware::userAuth();
        $tags = TagModel::getTags();
        Core::render('view/post/create.php', ['title' => 'Создать пост', 'tags' => $tags, 'token' => Core::getCSRFToken()]);
    }

    public static function upload()
    {
        Core::checkCSRFToken($_POST['token']);
        Middleware::userAuth();
        $date = new DateTime();

        $timestamp = $date->getTimestamp();
        if ($_FILES['image']['type'] == 'image/jpeg') {
            $nameFile = $timestamp . '.jpeg';
        } elseif ($_FILES['image']['type'] == 'image/png') {
            $nameFile = $timestamp . '.png';
        } else {
            exit();
        }
        move_uploaded_file($_FILES['image']['tmp_name'], "upload/images/$nameFile");

        $id = PostModel::addPost([
            "title" => $_POST["title"],
            "user_id" => $_SESSION["user"]["id"],
            "content" => $_POST["content"],
            "image" => $nameFile

        ])[0]["LAST_INSERT_ID()"];
        foreach ($_POST['tags'] as $tag) {
            PostTagModel::addRow([
                "post_id" => $id,
                "tag_id" => $tag
            ]);
        }
        Core::redirect('/');
    }

    public static function edit($values)
    {
        $id = $values[0];

        Middleware::userIsAuthorPost($id);

        $postTags = [];
        foreach (PostModel::getTags($id) as $tag) {
            $postTags[] = $tag['tag_id'];
        }
        $tags = TagModel::getTags();
        $post = PostModel::getPost($id);
        Core::render('view/post/edit.php', ['title' => 'Редактирование поста', 'post' => $post, 'tags' => $tags, 'post_tags' => $postTags, 'token' => Core::getCSRFToken()]);
        exit();
    }

    public static function destroy($values)
    {
        $id = $values[0];

        Middleware::userIsAuthorPost($id);

        PostModel::deletePost($id);
        Core::redirect('/');

    }

    public static function update($values)
    {
        $id = $values[0];

        Core::checkCSRFToken($_POST['token']);

        Middleware::userIsAuthorPost($id);

        $nameFile = PostModel::getPost($id)['image'];

        if ($_FILES['image']['type'] != '') {

            unlink('upload/images/'.$nameFile);

            $date = new DateTime();
            $timestamp = $date->getTimestamp();
            if ($_FILES['image']['type'] == 'image/jpeg') {
                $nameFile = $timestamp . '.jpeg';
            } elseif ($_FILES['image']['type'] == 'image/png') {
                $nameFile = $timestamp . '.png';
            } else {
                exit('213');
            }
            move_uploaded_file($_FILES['image']['tmp_name'], "upload/images/$nameFile");
        }

        PostTagModel::deleteRowsByPostId($id);

        foreach ($_POST['tags'] as $tag) {
            PostTagModel::addRow([
                "post_id" => $id,
                "tag_id" => $tag
            ]);
        }

        PostModel::updatePost([
            'id' => $id,
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image' => $nameFile
        ]);

        Core::redirect("/posts/$id");
    }


}