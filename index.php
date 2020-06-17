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
        elseif($_GET['action'] == 'addPostPage'){
            addPostPage(); 
        }
        elseif($_GET['action'] == 'addPost') {
            if (isset($_POST['author'])) {
               addPost();
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
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
                if (!empty($_POST['author']) && !empty($_POST['comment'])) 
                {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
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