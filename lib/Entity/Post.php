<?php

class Post
{
    protected   $errors = [],
                $id,
                $author,
                $title,
                $contain,
                $addDate,
                $updateDate;

    const AUTHOR_INVALIDE = 1;
    const TITLE_INVALIDE = 1;
    const CONTAIN_INVALIDE = 1;

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

    public function isNew()
    {
        return empty($this->id);
    }

    public function isValid()
    {
        return !(empty($this->author) || empty($this->title) || empty($this->contain));
    }

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setAuthor($author)
    {
        if (!is_string($author) || empty($author))
        {
            $this->errors[] = self::AUTHOR_INVALIDE;
        }

        $this->author = $author;
    }

    public function setTitle($title)
    {
        if (is_string($title) || empty($title))
        {
            $this->errors[] = self::TITLE_INVALIDE;
        }

        $this->title = $title;
    }

    public function setContain($contain)
    {
        if (is_string($contain) || empty($contain))
        {
            $this->errors[] = self::TITLE_INVALIDE;
        }

        $this->contain = $contain;
    }

    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;
    }

    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    public function errors()
    {
        return $this->errors;
    }
    
    public function id()
    {
        return $this->id;
    }

    public function author()
    {
        return $this->author;
    }

    public function title()
    {
        return $this->title;
    }

    public function contain()
    {
        return $this->contain;
    }

    public function addDate()
    {
        return $this->addDate;
    }

    public function updateDate()
    {
        return $this->updateDate;
    }

}