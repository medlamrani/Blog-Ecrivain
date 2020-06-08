<?php
require('controller/controller.php');
require('Admin/controller/PostController.php');
try
{
    if (isset($_GET['action']))
    {
        if($_GET['action'] == 'addPostPage')
        {
            addPostPage();  
        }
        elseif($_GET['action'] == 'addPost') 
        {
            if (!empty($_POST['title']) && !empty($_POST['content']))
            {
                addPost($_POST['title'], $_POST['content']);
            }
            else 
            {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
    }
    else
    {
        //getList();
        userInterface();
    }
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}