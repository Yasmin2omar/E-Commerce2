<?php
namespace App;

use PDO;
use PDOException;

class Database{
    private static ?Database $instance=null;
    private PDO $connection;
    private function __construct($config){
       try
        {
            $dsn="mysql:host={$config['host']};dbname={$config['dbname']}";
            $this->connection=new PDO($dsn,$config['user'],$config['password']);
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public static function getInstance($config){
        if(self::$instance===null){
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public  function getConnection(){
        return $this->connection;
    }
}

