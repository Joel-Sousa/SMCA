<?php

abstract class Conexao {

    private static $instance;

    /**
     * @return PDO
     */
    public static function getInstance() {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO("mysql:host=localhost;dbname=smca;charset=utf8", "root", "senha");                
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
            }
            return self::$instance;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}

?>
