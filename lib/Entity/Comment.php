<?php

class Comment 
{
  protected $errors = [],
            $postId,
            $author,
            $content,
            $report,
            $commentDate;
 
  const AUTHOR_INVALIDE = 1;
  const COMMENT_INVALIDE = 2;

  public function __construct( $values = [])
    {    
        if (!empty($values))
        {
            $this->hydrate($values);
        }
    }

    public function hydrate($datas)
    {
        foreach ($datas as $attribut => $value)
        {
            $method = 'set'.ucfirst($attribut);

            if (is_callable([$this, $method]))
            {
                $this->$method($value);
            }
        }
    }
 
  public function isValid()
  {
    return !(empty($this->author) || empty($this->content));
  }
 
  public function setPostId($postId)
  {
    $this->postId = (int) $postId;
  }
 
  public function setAuthor($author)
  {
    if (!is_string($author) || empty($author))
    {
      $this->errors[] = self::AUTHOR_INVALIDE;
    }
 
    $this->author = $author;
  }
 
  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->errors[] = self::COMMENT_INVALIDE;
    }
 
    $this->content = $content;
  }

  public function setReport($report)
  {
      $this->report = (int) $report;
  }
 
  public function setCommentDate($commentDate)
  {
    $this->commentDate = $commentDate;
  }

  public function errors()
    {
        return $this->errors;
    }
 
  public function postId()
  {
    return $this->postId;
  }
 
  public function author()
  {
    return $this->author;
  }
 
  public function content()
  {
    return $this->content;
  }

  public function report()
  {
      return $this->report;
  }
 
  public function commentDate()
  {
    return $this->commentDate;
  }


}
