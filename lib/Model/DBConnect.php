<?php

class DBConnect
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;


    public function connect()
    {
        $this->servername = "db5000603423.hosting-data.io";
        $this->username = "dbu581270";
        $this->password = "Forteroche.21";
        $this->dbname = "dbs582208";
        $this->charset = "utf8";

    
        try 
        {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } 
        catch (PDOException $e) 
        {
            echo "Connection failed : ".$e->getMessage();
        }

    }
}