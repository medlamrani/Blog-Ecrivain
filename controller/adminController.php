<?php

require_once('lib/Model/PostManager.php');
require_once('lib/Model/CommentManager.php');
require_once('lib/Model/UserManager.php');
require_once('lib/Model/DBConnect.php');
require_once('lib/Entity/Post.php');


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
        require('views/administration.php');
    }


    public function addPost(){

        $this->sessionExists();

        $postManager = new PostManager();

        $post = new Post(
            [
                'author' => $_POST['author'],
                'title' => $_POST['title'],
                'contain' => $_POST['contain']
            ]
        );

        if($post->isValid())
        {
            $postManager->save($post);
            header('Location: index.php?action=administration');
        }
        else
        {
            echo 'ajout impossible';
        }

        require('views/addPost.php');

        
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

    public function logIn()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $admin = new UserManager();

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

}
