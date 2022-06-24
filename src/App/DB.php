<?php

namespace App;

use PDO;

class DB
{
    private $db;

    public function __construct()
    {
        $dbinfo = [
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'dbname' => 'metamorfositask'
        ];
        $this->db = new PDO(
            'mysql:host=' . $dbinfo['host'] . ';dbname=' . $dbinfo['dbname'],
            $dbinfo['login'],
            $dbinfo['password']);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}