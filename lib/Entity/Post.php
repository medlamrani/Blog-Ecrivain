<?php

class Post
{
    protected   $errors = [],
                $id,
                $userId,
                $title,
                $content,
                $addDate,
                $updateDate;

    const AUTHOR_INVALIDE = 1;
    const TITLE_INVALIDE = 1;
    const CONTENT_INVALIDE = 1;

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
        return !(empty($this->title) || empty($this->content));
    }

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setUserId($userId)
    {
        $this->userId = (int) $userId;
    }

    public function setTitle($title)
    {
        if (is_string($title) || empty($title))
        {
            $this->errors[] = self::TITLE_INVALIDE;
        }

        $this->title = $title;
    }

    public function setContent($content)
    {
        if (is_string($content) || empty($content))
        {
            $this->errors[] = self::TITLE_INVALIDE;
        }

        $this->content = $content;
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

    public function userId()
    {
        return $this->userId;
    }

    public function title()
    {
        return $this->title;
    }

    public function content()
    {
        return $this->content;
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