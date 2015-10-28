<?php

class Database
{
    protected $database;

    function __construct($dsn, $login, $pwd)
    {
        try {
        $this->database = new PDO($dsn, $login, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    } catch (PDOException $e) {
        /* Je zvoleno ze PDO bude vyhazovat vyjimky, takze je treba je odchytvat
         * a popr. alespon castecne zjistit co se stalo */
        die("Connection failed: " . $e->getMessage());
    }
    }

    public function vypis_vsechny_radky($table)
    {
        try {
                $query = $this->database->prepare("SELECT * FROM".$tabe);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            //spustim dotaz
            try {
                $query->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        return $query;
    }

    public function get_database()
    {
        return $this->database;
    }
}
