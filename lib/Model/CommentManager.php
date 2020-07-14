<?php

require_once('DBConnect.php');

class CommentManager extends DBConnect
{
  protected function addComment(Comment $comment)
  {
      $sql = "INSERT INTO comment SET post_id = :post_id, author = :author, content = :content, report = 0, commentDate = NOW()";
      $q = $this->connect()->prepare($sql);
  
      $q->bindValue(':post_id', $comment->post_id(), \PDO::PARAM_INT);
      $q->bindValue(':author', $comment->author());
      $q->bindValue(':content', $comment->content());
  
      $q->execute();
  
      //$comment->setId($this->connect()->lastInsertId());
  }
 
  public function delete($id)
  {
      $sql = "DELETE FROM comment WHERE id = ".(int) $id;
      $req = $this->connect()->exec($sql);
  }
 
  public function deleteFromPost($post_id)
  {
      $sql = "DELETE FROM comment WHERE post_id = ".(int) $post_id;
      $req = $this->connect()->exec($sql);
  }
 
  public function getListOf($post_id)
  {
      if (!ctype_digit($post_id))
      {
        throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
      }

      $sql = 'SELECT id, post_id, author, content, commentDate FROM comment WHERE post_id = :post_id';
  
      $q = $this->connect()->prepare($sql);
      $q->bindValue(':post_id', $post_id, \PDO::PARAM_INT);
      $q->execute();
  
      $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
  
      $comments = $q->fetchAll();
  
      var_dump($comments);
      
      
  
      return $comments;
  }
 
  public function get($id)
  {
      $sql = "SELECT id, post_id, author, content FROM comment WHERE id = :id";
      $q = $this->connect()->prepare();
      $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
      $q->execute();
  
      $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
  
      return $q->fetch();
  }

  public function save(Comment $comment)
  {
      if($comment->isValid())
      {
          $this->addComment($comment);
      }
      else
      {
          throw new RuntimeException('Le commentaire doit etre valide pour etre enregistree');
      }
  }

  public function report($id)
  {
      $sql = 'UPDATE comment SET report = 1 WHERE id = '.(int) $id;
      $req = $this->connect()->exec($sql);
  }

}
