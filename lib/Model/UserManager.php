<?php

require_once('DBConnect.php');

class UserManager extends DBConnect
{         
             
   public function adminConnect($username, $password)
   {
       $sql = "SELECT id, password FROM user WHERE username = :username";

       $req = $this->connect()->prepare($sql);
       $req->execute(array(
           'username' => $username
       ));

       $result = $req->fetch();

       // hachage password_verify

       $isPasswordCorrect = $password == $result['password'];
       var_dump($isPasswordCorrect);

       if (!$result)
       {
           $_SESSION['message'] = 'Login et mot de passe incorrect';
           return false;
       }
       else
       {
            if ($isPasswordCorrect)
            {
                session_start();
                $_SESSION['id'] = $result['id'];
                $_SESSION['username'] = $username;
                echo 'Vous etes connecte !';
                
                return true;
            }
            else
            {
                $_SESSION['message'] = 'Login et mot de passe incorrect';
                return false;
            } 
       }
   }
}