<?php

include_once 'config.php';
/**
 * Conect To DB
 */

class Connection{

    public static function connect(){
        try {
                $pdoOptions = array(
                                        PDO::ATTR_EMULATE_PREPARES => FALSE,
                                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''
                                    );

                $link = new PDO(''.DRIVER.':host='.SERVER.';dbname='.DATABASE, USERNAME, PASSWORD, $pdoOptions);
                return $link;

        }catch(PDOException $e){
                echo "Fallo la conexión: " . $e->getMessage();
        }
    }
}