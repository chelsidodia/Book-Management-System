<?php

//Book class: contains constructor and get methods for each Book property: getTitle, getAuthor, getpublication_year

class Book {

    public string $title;
    public string $author;
    public int $publication_year;

    public function __construct($title, $author, $publication_year) {

        if ($title == "" || $author == "" || $publication_year == "") {
            throw new Exception("Kindly enter all fields.");
        }

        if (!is_numeric($publication_year) || $publication_year < 0) {
            throw new Exception("Publication year cannot be negative.");
        }

        $this->title = $title;
        $this->author = $author;
        $this->publication_year = (int) $publication_year;
    }

    public function getPublicationYear() {
        return $this->publication_year;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }
}
?>