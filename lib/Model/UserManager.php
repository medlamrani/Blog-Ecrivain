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
 
       
       $isPasswordCorrect = password_verify($password, $result['password']);
       

       if (!$result)
       {
           $_SESSION['message'] = 'Login et mot de passe incorrect';
           var_dump($result['password']);
           return false;
       }
       else
       {
            if ($isPasswordCorrect)
            {
                $_SESSION['id'] = $result['id'];
                $_SESSION['username'] = $username;
                
                $_SESSION['message'] = 'Vous etes connecte !';  
                
                return true;
            }
            else
            {
                $_SESSION['message'] = 'Login et mot de passe incorrect';
                var_dump($password);
                
                return false;
            } 
       }
   }

   public function addUser(User $user)
    {
        
        $sql = "INSERT INTO user (username, password) VALUES(:username, :password)";
        $db = $this->connect()->prepare($sql);
        

        $db->bindValue(':username', $user->username());
        $db->bindValue(':password', $user->password());

        $db->execute();

        $_SESSION['message'] = 'User added'; 
    }
}