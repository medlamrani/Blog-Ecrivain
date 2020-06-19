<?php

require_once('DBConnect.php');

class CommentManager extends DBConnect
{
  protected function addComment(Comment $comment)
  {
    $q = $this->connect()->prepare('INSERT INTO comments SET postId = :postId, author = :author, contain = :contain, report = 0, commentDate = NOW()');
 
    $q->bindValue(':postId', $comment->postId(), \PDO::PARAM_INT);
    $q->bindValue(':author', $comment->author());
    $q->bindValue(':contain', $comment->contain());
 
    $q->execute();
 
    $comment->setId($this->connect()->lastInsertId());
  }
 
  public function delete($id)
  {
    $this->connect()->exec('DELETE FROM comments WHERE id = '.(int) $id);
  }
 
  public function deleteFromNews($postId)
  {
    $this->connect()->exec('DELETE FROM comments WHERE postId = '.(int) $postId);
  }
 
  public function getListOf($postId)
  {
    if (!ctype_digit($postId))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }
 
    $q = $this->connect()->prepare('SELECT id, postId, author, contain, commentDate FROM comments WHERE postId = :postId');
    $q->bindValue(':postId', $postId, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    $comments = $q->fetchAll();
 
    foreach ($comments as $comment)
    {
        $comment->setCommentDate(new \DateTime($comment->commentDate()));
    }
 
    return $comments;
  }
 
  protected function modify(Comment $comment)
  {
    $q = $this->connect()->prepare('UPDATE comments SET author = :author, contain = :contain WHERE id = :id');
 
    $q->bindValue(':author', $comment->author());
    $q->bindValue(':contain', $comment->contain());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
 
    $q->execute();
  }
 
  public function get($id)
  {
    $q = $this->connect()->prepare('SELECT id, postId, author, contain FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    return $q->fetch();
  }
}
