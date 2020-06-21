<?php

require_once('DBConnect.php');

class PostManager  extends DBConnect
{
    public function getPosts($debut = -1, $limite = -1)
    {
      
        $sql = 'SELECT id, author, title, contain, addDate, updateDate FROM post ORDER BY id';

        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT ' . (int) $limite. ' OFFSET '. (int) $debut;
        }

        $req = $this->connect()->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');

        $listPost = $req->fetchAll();

        foreach ($listPost as $post)
        {
            $post->setAddDate(new DateTime($post->addDate()));
            $post->setUpdateDate(new DateTime($post->updateDate()));
        }

        $req->closeCursor();

        return $listPost;

    }

    public function getPost($id)
    {
        $sql = "SELECT id, author, title, contain, addDate, updateDate FROM post WHERE id = :id";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');

        $post = $req->fetch();

        $post->setAddDate(new DateTime($post->addDate()));
        $post->setUpdateDate(new DateTime($post->updateDate()));

        return $post;
    }

    public function addPost(Post $post)
    {
        $sql = "INSERT INTO post(author, title, contain, addDate, updateDate)
        VALUES(:author, :title, :contain, NOW(), NOW())";
        $db = $this->connect()->prepare($sql);
        

        $db->bindValue(':title', $post->title());
        $db->bindValue(':author', $post->author());
        $db->bindValue(':contain', $post->contain());

        $db->execute();
    }

    public function deletePost($id)
    {

    }

    public function updatePost(Post $post)
    {
        $sql = "UPDATE post SET author = :author, title = :title, contain = :contain, updateDate = NOW() WHERE id = :id";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':title', $post->title());
        $req->bindValue(':author', $post->author());
        $req->bindValue(':contain', $post->contain());
        $req->bindValue(':id', $post->id(), PDO::PARAM_INT);

        $req->execute();
    }


    public function save(Post $post)
    {
        if($post->isValid())
        {
            $post->isNew() ? $this->addPost($post) : $this->updatePost($post);
        }
        else{
            throw new RuntimeException('L\'article doit etre valide pour etre enregistree');
        }
    }
 
}