<?php

final class PDOMaker
{
    private static $dsn = 'mysql:host=127.0.0.1;dbname=codersplug;port=3306';
    private static $db_user = 'root';
    private static $db_pass = '';
    private static $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];
    private static $instance = null;


    public static function getInstance(){
        if (static::$instance === null) {
            static::$instance = new PDO(static::$dsn,static::$db_user, static::$db_pass, static::$opt);
        }
        return static::$instance;
    }

    private function __construct(){
    }

    private function __clone(){
    }

    private function __wakeup(){
    }
}

?>