<?php

require_once('lib/Model/PostManager.php');
require_once('lib/Model/CommentManager.php');
require_once('lib/Model/UserManager.php');
require_once('lib/Model/DBConnect.php');
require_once('lib/Entity/Post.php');
require_once('lib/Entity/User.php');
require_once('lib/Entity/Comment.php');


class AdminController
{

    public function sessionExists()
    {
        if (empty($_SESSION['id']))
        {
            header('Location: index.php?action=login');
            exit(); 
        }
    }

    public function loginForm()
    {
        require('views/logIn.php');
    }

    public function administration()
    {
        $this->sessionExists();

        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $reported = $commentManager->reportedComment();
        
        require('views/administration.php');
    }


    public function addPost(){

        $this->sessionExists();

        $postManager = new PostManager();

        if(isset($_POST['title']))
        {
            $post = new Post(
                [
                    'userId' => $_SESSION['id'],
                    'title' => $_POST['title'],
                    'content' => $_POST['content']
                ]
            );

            $postManager->save($post);
            require('views/administration.php');                       
        }
        else
        {
            require('views/addPost.php');
        }   
        
    }

    public function updatePost($id)
    {
        $this->sessionExists();

        $postManager = new PostManager();

        if(isset($_POST['title']))
        {
            $post = new Post(
                [
                    'userId' => $_SESSION['id'],
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'id' => $id
                ]
            );


            $postManager->save($post);
            require('views/administration.php'); 
            

        }
        else
        {
            require('views/updatePost.php');
        }
        
    }

    public function deletePost($id)
    {
        $this->sessionExists();

        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $postManager->deletePost($id); // supprimer l'article
        $commentManager->deleteFromPost($id); // supprimer les commentaire de cet article

        header('Location: index.php?action=administration');
    }

    public function noReportComment($id)
    {
        $commentManager = new CommentManager();

        $reportComment = $commentManager->noReport($id);

        header('Location: index.php?action=administration');
    }

    public function inscription()
    {
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $userManager = new UserManager();

        if(isset($_POST['username']))
        {
            $user = new User(
                [
                    'username' => $_POST['username'],
                    'password' => $pass_hache
                ]
            );

            $userManager->addUser($user);
            require('views/home.php');                       
        }
        else
        {
            require('views/addUser.php');
        }
    }

    public function logIn()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $admin = new UserManager();
        var_dump($password);

        $result = $admin->adminConnect($username, $password);

        if($result == true)
        {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            require('views/administration.php');
        }
        else
        {              
            require('views/logIn.php');          
        }

    }

    public function logOut()
    {
        session_destroy();
        header('Location: index.php');
    }

}
