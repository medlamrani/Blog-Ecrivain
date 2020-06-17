<?php

require_once('DBConnect.php');

class Admin extends DBConnect
{
    protected $username,
              $password;
              
              
    public function isAdmin()
    {
        session_start();
        
        $sql = "SELECT * FROM user";
        $db = $this->connect()->query($sql); 
    }
}