<?php

class Notice {

    private $id;
    private $title;
    private $desc;

    public function __construct(int $id, string $title, string $desc)
    {
        $this->id = $id;
        $this->title = $title;
        $this->desc = $desc;

    }

    public function getId(): int {
        return $this->id;
    }

    function getTitle(): string {
        return $this->title;
    }

    function getDescr(): string {
        return $this->desc;
    }

}