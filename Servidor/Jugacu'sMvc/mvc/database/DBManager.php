<?php


class DBManager
{
    public static $params = [
        "server" => "(local)", // DB server name / ip
        "port" => "1433", // DN server port
        "database" => "sqlejxd", //DB name
        "user" => null, // DB user
        "pass" => null, // DBN password
        "charset" => "utf-8"
    ];

    public static function getConnexion(): PDO
    {
        $dsn = 'sqlsrv:server=' . DBManager::$params['server'] . ',' . DBManager::$params['port'] . ';' . 'Database=' . DBManager::$params['database'];

        $con = new PDO($dsn, DBManager::$params['user'], DBManager::$params['pass']);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $con;
    }
}
