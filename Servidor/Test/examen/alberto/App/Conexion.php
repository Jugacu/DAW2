<?php

class DB {

    private $con;

    function __construct(){
        $dsn = "mysql:host=127.0.0.1;dbname=goyo";
        $user = "root";
        $passwd = "rootroot";

        $this->con = new PDO($dsn, $user, $passwd);
    }

    function getConexion(): PDO {
        return $this->con;
    }

}