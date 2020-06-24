<?php

require_once('lib/Model/PostManager.php');
require_once('lib/Model/DBConnect.php');
require_once('lib/Model/CommentManager.php');
require_once('lib/Entity/Comment.php');
require_once('lib/Entity/Post.php');

function getList()
{
    $postManager = new PostManager();
    require('views/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getListOf($_GET['id']);

    require('views/postView.php');
}

function addComment($postId)
{
    $commentManager = new CommentManager();

    $comment = new Comment(
        [
            'postId' => $_GET['id'],
            'author' => $_POST['author'],
            'contain' => $_POST['contain']
        ]
    );


    if($comment->isValid())
    {
        $commentManager->save($comment);
    }
    else
    {
        $errors = $comment->errors();
    }

    header('Location: index.php?action=post&id=' . $postId);
    
}


function reportComment($id)
{
    $commentManager = new CommentManager();

    $reportComment = $commentManager->report($id);

    echo 'le commentaire a ete signaler';

    //header('Location: index.php?action=post&id=' . $postId);
}

