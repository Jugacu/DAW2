<?php

class Book
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $author;
    /**
     * @var Genre
     */
    public $genre;
    /**
     * @var string
     */
    public $lang;
    /**
     * @var string
     */
    public $summary;

    /**
     * Book constructor.
     * @param int $id
     * @param string $title
     * @param string $author
     * @param Genre $genre
     * @param string $lang
     * @param string $summary
     */
    public function __construct(int $id, string $title, string $author, Genre $genre, string $lang, string $summary)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->lang = $lang;
        $this->summary = $summary;
    }

}
