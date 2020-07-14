<?php

require_once('DBConnect.php');

class PostManager  extends DBConnect
{
    public function getPosts($debut = -1, $limite = -1)
    {
      
        $sql = 'SELECT id, user_id, title, content, addDate, updateDate FROM post ORDER BY id DESC';

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
        $sql = "SELECT id, user_id, title, content, addDate, updateDate FROM post WHERE id = :id";
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
        $sql = "INSERT INTO post(user_id, title, content, addDate, updateDate)
        VALUES(:user_id, :title, :content, NOW(), NOW())";
        $db = $this->connect()->prepare($sql);
        

        $db->bindValue(':title', $post->title());
        $db->bindValue(':user_id', $post->user_id());
        $db->bindValue(':content', $post->content());

        $db->execute();
    }

    public function deletePost($id)
    {
        $sql = "DELETE FROM post WHERE id = ".(int) $id;
        $req = $this->connect()->exec($sql);
    }

    public function updatePost(Post $post)
    {
        $sql = "UPDATE post SET user_id = :user_id, title = :title, content = :content, updateDate = NOW() WHERE id = :id";
        $req = $this->connect()->prepare($sql);

        $req->bindValue(':title', $post->title());
        $req->bindValue(':user_id', $post->user_id());
        $req->bindValue(':content', $post->content());
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