<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= array_key_exists('title', $values) ? $values['title'] : 'Document123' ?></title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
</head>
<body>
<? session_start(); ?>
<div class="container">

    <div class="box m-3">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="/">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/posts/create">Новый пост</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/tags">Теги</a>
            </li>
            <? if (empty($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/sign-in">Вход</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sign-up">Регистрация</a>
                </li>
            <? endif ?>
            <? if ($_SESSION['user']): ?>

                <li class="nav-item">
                    <a class="nav-link" href="/sign-out">Выйти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#"><?=$_SESSION['user']['username']?></a>
                </li>
            <? endif ?>
        </ul>
    </div>






