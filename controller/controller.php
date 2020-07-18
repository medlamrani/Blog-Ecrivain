<?php

require_once('lib/Model/PostManager.php');
require_once('lib/Model/DBConnect.php');
require_once('lib/Model/CommentManager.php');
require_once('lib/Entity/Comment.php');
require_once('lib/Entity/Post.php');

class Controller
{
    public function getList()
    {
        $postManager = new PostManager();
        require('views/listPostsView.php');
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getListOf($_GET['id']);

        require('views/postView.php');
    }

    public function addComment($postId)
    {
        $commentManager = new CommentManager();

        $comment = new Comment(
            [
                'postId' => $_GET['id'],
                'author' => $_POST['author'],
                'content' => $_POST['content']
            ]
        );


        if($comment->isValid())
        {
            $commentManager->save($comment);
        }
        else
        {
            $_SESSION['message'] = 'Commentaire ff';
        }

        header('Location: index.php?action=post&id=' . $postId);
        
    }


    public function reportComment($id)
    {
        $commentManager = new CommentManager();

        $reportComment = $commentManager->report($id);

        echo 'le commentaire a ete signaler';

    }
}



