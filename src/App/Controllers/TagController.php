<?php

namespace App\Controllers;

use App\Core;
use App\Middleware;
use App\Models\TagModel;

class TagController
{
    public static function index()
    {
        $tags = TagModel::getTags();
        Core::render('view/tags/index.php', ['title' => 'Теги', 'tags' => $tags]);
    }

    public static function show($values)
    {
        $id = $values[0];
        $tag = TagModel::getTag($id);
        $posts = TagModel::getPosts($id);
        Core::render('view/tags/show.php', ['title' => 'Теги', 'tag' => $tag, 'posts' => $posts]);
    }

    public static function create()
    {
        Middleware::userAuth();

        Core::render('view/tags/create.php', ['title' => 'Новый тег', 'token' => Core::getCSRFToken()]);
    }


    public static function edit($values)
    {
        $id = $values[0];
        Middleware::userAuth();
        $tag = TagModel::getTag($id);
        Core::render('view/tags/edit.php', ['title' => 'Редактирование тега', 'tag' => $tag, 'token' => Core::getCSRFToken()]);
    }

    public static function upload()
    {
        Core::checkCSRFToken($_POST['token']);
        Middleware::userAuth();
        TagModel::addTag([
            "title" => $_POST["title"],
        ]);
        Core::redirect("/tags");
    }

    public static function update($values)
    {
        Core::checkCSRFToken($_POST['token']);
        Middleware::userAuth();
        $tag = $_POST;
        $tag['id'] = $values[0];
        TagModel::updateTag($tag);
        Core::redirect("/tags/$values[0]");

    }

    public static function destroy($values)
    {
        Middleware::userAuth();
        $id = $values[0];
        TagModel::deleteTag($id);
        Core::redirect('/tags');
    }
}