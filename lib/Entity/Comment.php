<?php

class Comment 
{
  protected $errors = [],
            $postId,
            $author,
            $contain,
            $report,
            $commentDate;
 
  const AUTHOR_INVALIDE = 1;
  const COMMENT_INVALIDE = 2;
 
  public function isValid()
  {
    return !(empty($this->author) || empty($this->contain));
  }
 
  public function setPost($postId)
  {
    $this->postId = (int) $postId;
  }
 
  public function setAuteur($author)
  {
    if (!is_string($author) || empty($author))
    {
      $this->errors[] = self::AUTHOR_INVALIDE;
    }
 
    $this->author = $author;
  }
 
  public function setContenu($contain)
  {
    if (!is_string($contain) || empty($contain))
    {
      $this->errors[] = self::COMMENT_INVALIDE;
    }
 
    $this->contain = $contain;
  }
 
  public function setDate(\DateTime $commentDate)
  {
    $this->commentDate = $commentDate;
  }
 
  public function postId()
  {
    return $this->postId;
  }
 
  public function author()
  {
    return $this->author;
  }
 
  public function contain()
  {
    return $this->contain;
  }
 
  public function commentDate()
  {
    return $this->commentDate;
  }
}
