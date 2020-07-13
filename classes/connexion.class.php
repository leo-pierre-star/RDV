<?php
class Connexion
{
    static public $pdo;

    public static function Init()//Classe se connecter
    {
        $host = Conf::HOST;
        $dbname = Conf::DBNAME;
        $user = Conf::USER;
        $pwd = Conf::PWD;
        self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
