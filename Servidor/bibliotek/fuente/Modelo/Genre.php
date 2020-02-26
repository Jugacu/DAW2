<?php


class Genre
{

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $desc;

    /**
     * Genre constructor.
     * @param int $id
     * @param string $name
     * @param string $desc
     */
    public function __construct(int $id, string $name, string $desc)
    {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
    }


}
