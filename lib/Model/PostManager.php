<?php

require_once('Manager.php');

class PostManager extends Manager
{
    
    public function addPost(Post $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post(author, title, contain, addDate, updateDate) 
        VALUES(:author, :title, :contain, NOW(), NOW())');
        
        $req->bindValue(':title', $post->title());
        $req->bindValue(':author', $post->author());
        $req->bindValue(':contain', $post->contain());

        $req->execute();
    }

    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $db->exec('DELETE FROM post WHERE id = ? ');
    }

    public function updatePost(Post $post)
    {
        $db = $this->dbConnect();
        // update a faire 
        $req = $this->db->prepare('UPDATE post SET author = :author, title = :title, contain = :contain, updateDate = NOW() WHERE id = :id');

        $req->bindValue(':title', $post->title());
        $req->bindValue(':author', $post->author());
        $req->bindValue(':contain', $post->contain());
        $req->bindValue(':id', $post->id(), PDO::PARAM_INT);

        $req->execute();
    }

    public function getPostList()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, contain, addDate, updateDate FROM post ORDER BY addDate DESC LIMIT 0, 5');
        $listPost = $req->fetchAll();

        $req->closeCursor();

        return $listPost;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, contain, addDate, updateDate FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}