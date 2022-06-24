<?php

namespace App;

class Core
{
    public static $routers;

    public static function render($view, $values)
    {
        require_once 'view/header.php';
        require_once $view;
        require_once 'view/footer.php';
        exit();
    }

    public static function showError404()
    {
        Core::render('view/404.php', ['title' => 'Ресурс не найден']);
    }

    public static function redirect($url)
    {
        header("Location: $url");
        exit();
    }

    public static function init()
    {

        $query = key($_GET);

        if (strlen($query) > 1) {
            if (substr($query, -1) == '/') {
                $query = substr($query, 0, -1);
            }
        }


        $values = preg_grep("(\d+)", explode("/", $query));
        $query = preg_replace("(\d+)", ":int:", $query);
        $values = array_values($values);

        foreach (self::$routers as $router) {
            if ($router[0] == "/" . strtolower($query)) {
                count($values) ? eval($router[1] . '($values);') : eval($router[1] . '();');
                exit();
            }
        }

        Core::showError404();
    }

    public static function checkCSRFToken($token)
    {
        if (Core::getCSRFToken() != $token) {
            Core::render('/view/csrf.php', ['title' => 'CSRF attack']);
        }
    }

    public static function getCSRFToken()
    {
        return $_SESSION['csrf_token'];
    }

}