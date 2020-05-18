<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    //var_dump($posts);

    require('views/posts/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('views/posts/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function addPost($title, $content){
    $postManager = new PostManager();
    $newpost = $postManager->newPost($title, $content);
    var_dump($newpost);
    header('Location: index.php');
}

function addMember(){

    $memberManager = new MemberManager();
    $addMember = $memberManager->createMember();

    require('views/login/inscription.php');
}

function logIn(){

    $memberManager = new MemberManager();
    $logIn = $memberManager->register();

    require('views/login/connexion.php');
}



