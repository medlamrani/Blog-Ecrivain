<?php

require_once('/lib/Model/PostManager.php');

function userInterface()
{
    $postManager = new PostManager();
    $posts = $postManager->getPostList();

    require('Admin/views/administration.php');
}

function addPostPage(){
    require('Admin/views/addPost.php');
}

function addPost(){

    $postManager = new PostManager();
    $newpost = $postManager->addPost();
    header('Location: index.php');
}