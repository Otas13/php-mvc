<?php

require_once 'Database.php';

class Admin_model
{
    protected $database;

    public function __construct()
    {
        $connection = new Database('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
        $this->database = $connection->get_database();
    }

    /*
        funkce zjisti soucany vyskyt loginu a hesla v databazi
        vrati radek uzivatele
    */
    public function login($username, $pwd)
    {
        try{
            $query = $this->database->prepare('SELECT COUNT(*) FROM admin WHERE login = ? AND pwd = ?');
        }catch(PDOExceptiopn $e){die($e->getMessage());}

        $params = array($username, $pwd);

        try{
            $query->execute($params);
        }catch(PDOExceptiopn $e){die($e->getMessage());}

        if($query->fetchColumn(0) == 1)
        {
            try{
            $row = $this->database->prepare('SELECT * FROM admin WHERE login = ? AND pwd = ?');
        }catch(PDOExceptiopn $e){die($e->getMessage());}

            try{
            $row->execute($params);
        }catch(PDOExceptiopn $e){die($e->getMessage());}

            return $row->fetch();
        }else
        {
            return false;
        }
    }


    /*
        kontrola prihlaseni
    */
    public function verify_login()
    {
        if(!isset($_SESSION['id']) || $_SESSION['id'] == '')
        {
            return false;
        }else{
            return true;
        }
    }

    /*
        zpracovani dat z login formulare
    */
    public function login_submit($_POST){
        $login = md5(htmlentities($_POST['login']));
        $pwd = md5(htmlentities($_POST['pwd']));

        if(($admin_data = $this->login($login, $pwd)) != false)
        {

            session_regenerate_id();
            $_SESSION['id'] = $admin_data['id'];
            $_SESSION['nick'] = $admin_data['nick'];
            $_SESSION['bad'] = 'sdfsadfsdfasdfaff';
            return true;
        }else{
           # neuspesny login
            return false;
        }
    }
}
