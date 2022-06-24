<?php

namespace App;

require_once __DIR__ . '/vendor/autoload.php';



session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

Core::$routers = [
    ["/sign-in", "App\Controllers\Auth\SignInController::index"],
    ["/sign-in/upload", "App\Controllers\Auth\SignInController::upload"],

    ["/sign-up", "App\Controllers\Auth\SignUpController::index"],
    ["/sign-up/upload", "App\Controllers\Auth\SignUpController::upload"],

    ["/sign-out", "App\Controllers\Auth\SignOutController::destroy"],

    ["/", "App\Controllers\MainController::index"],


    ["/tags", "App\Controllers\TagController::index"],
    ["/tags/:int:", "App\Controllers\TagController::show"],
    ["/tags/create", "App\Controllers\TagController::create"],
    ["/tags/upload", "App\Controllers\TagController::upload"],
    ["/tags/:int:/edit", "App\Controllers\TagController::edit"],
    ["/tags/:int:/delete", "App\Controllers\TagController::destroy"],
    ["/tags/:int:/update", "App\Controllers\TagController::update"],


    ["/posts/:int:", "App\Controllers\PostController::show"],
    ["/posts/create", "App\Controllers\PostController::create"],
    ["/posts/upload", "App\Controllers\PostController::upload"],
    ["/posts/:int:/edit", "App\Controllers\PostController::edit"],
    ["/posts/:int:/delete", "App\Controllers\PostController::destroy"],
    ["/posts/:int:/update", "App\Controllers\PostController::update"],
];

Core::init();
