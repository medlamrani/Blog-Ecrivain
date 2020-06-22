<?php

require_once('lib/Model/PostManager.php');
require_once('lib/Model/DBConnect.php');
require_once('lib/Model/CommentManager.php');
require_once('lib/Entity/Post.php');


function administration()
{
    $postManager = new PostManager();


    require('views/administration.php');
}


function addPostPage(){
    require('views/addPost.php');
}


function addPost(){

    $postManager = new PostManager();

    $post = new Post(
        [
            'author' => $_POST['author'],
            'title' => $_POST['title'],
            'contain' => $_POST['contain']
        ]
    );

    if(isset($_POST['id']))
    {
        $post->setId($_POST['id']);
    }

    if($post->isValid())
    {
        $postManager->save($post);

        $message = $post->isNew() ? 'La News a bien ete ajoutee !' : 'La news a bien ete modifiee !';
    }
    else
    {
        $errors = $post->errors();
    }

    header('Location: index.php?action=addPost');
}