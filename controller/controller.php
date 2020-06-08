<?php

require_once('lib/Model/PostManager.php');

function getList()
{
    $postManager = new PostManager();
    $posts = $postManager->getPostList();

    require('views/listPostsView.php');
}