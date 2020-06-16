<?php
namespace Source\support\conection;

use PDO;
use PDOException;

require_once("config.php");


class Conection
{

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    public static $instance;

    public static function getInstance(){
        if(empty(self::$instance)){
            try{
                self::$instance = new PDO(
                    "mysql:host=" . CONF_DB_HOST.";dbname=" . CONF_DB_DBNAME,
                    CONF_DB_USER,
                    CONF_DB_PASSWORD,
                    self::OPTIONS
                );
            }catch(PDOException $exception){
                die("Erro ao conectar com o BD");
            }
        }

        return self::$instance;
    }

    final private function __destruct(){
        
    }

    final private function __clone(){

    }
}