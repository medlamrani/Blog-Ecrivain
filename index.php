<?php
require('controller/controller.php');
require('controller/adminController.php');

try
{
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'listPosts') 
        {
            getList();           
        }
        elseif($_GET['action'] == 'administration')
        {   
            administration();
        } 

        elseif($_GET['action'] == 'addPost') {
            if (isset($_POST['author'])) {
               addPost();
            }
            else {
                addPostPage(); 
            }
        } 
        elseif ($_GET['action'] == 'post')
        {
             if (isset($_GET['id']) && $_GET['id'] > 0) {
                 post();
             }
             else {
                 throw new Exception('Aucun identifiant de billet envoyé');
             }
        }
        elseif ($_GET['action'] == 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (!empty($_POST['author']) && !empty($_POST['contain'])) 
                {
                    addComment($_GET['id']);
                }
                else                 
                {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'reportComment')
        {
            reportComment($_GET['id']);
        }
    }
    else
    {
        getList();
    }
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}