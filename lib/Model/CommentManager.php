<?php

require_once('DBConnect.php');

class CommentManager extends DBConnect
{
  protected function addComment(Comment $comment)
  {
      $sql = "INSERT INTO comment SET post_id = :post_id, author = :author, content = :content, report = 0, commentDate = NOW()";
      $q = $this->connect()->prepare($sql);
  
      $q->bindValue(':post_id', $comment->postId(), \PDO::PARAM_INT);
      $q->bindValue(':author', $comment->author());
      $q->bindValue(':content', $comment->content());
  
      $q->execute();
  
      $_SESSION['message'] = 'Commentaire ajoute !'; 
  }
 
  public function delete($id)
  {
      $sql = "DELETE FROM comment WHERE id = ".(int) $id;
      $req = $this->connect()->exec($sql);

      $_SESSION['message'] = 'Commentaire supprime avec succes !'; 
  }
 
  public function deleteFromPost($postId)
  {
      $sql = "DELETE FROM comment WHERE post_id = ".(int) $postId;
      $req = $this->connect()->exec($sql);
  }
 
  public function getListOf($postId)
  {
      if (!ctype_digit($postId))
      {
        $_SESSION['message'] = 'L\'identifiant de la news passé doit être un nombre entier valide'; 
      }

      $sql = 'SELECT id, post_id, author, content, report, commentDate FROM comment WHERE post_id = :post_id';
  
      $q = $this->connect()->prepare($sql);
      $q->bindValue(':post_id', $postId, \PDO::PARAM_INT);
      $q->execute();
  
      $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
  
      $comments = $q->fetchAll();

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
          $_SESSION['message'] = 'Le commentaire doit etre valide pour etre enregistree'; 
      }
  }

  public function report($id)
  {
      $sql = 'UPDATE comment SET report = 1 WHERE id = '.(int) $id;
      $req = $this->connect()->exec($sql);

      $_SESSION['message'] = 'Le commentaire a ete signaler'; 
  
  }

  public function noReport($id)
  {
    $sql = 'UPDATE comment SET report = 0 WHERE id = '.(int) $id;
    $req = $this->connect()->exec($sql);

    $_SESSION['message'] = 'Le commentaire a ete approuver'; 
  }

  public function reportedComment()
  {
      $sql= "SELECT * FROM comment WHERE report = 1";
      $req = $this->connect()->query($sql);

      $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Comment');
      $listreport = $req->fetchAll();

      return $listreport;
  }

}
