<?php

class catalog {
    private ?mysqli $conn;

    public int $id;
    public ?string $name;
    public ?string $author;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->author = htmlspecialchars(strip_tags($this->author));

        $query = "INSERT INTO book(name, author) VALUE ('".$this->name."', '".$this->author."');";

        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }

    function get() {
        $query = "SELECT b.id, b.name, b.author FROM book AS b WHERE b.id = ".$this->id.";";

        $result = $this->conn->query($query)->fetch_row();
        return $result;
    }

    function get_all() {
        $query = "SELECT * FROM book;";
        $result = $this->conn->query($query);
        return $result;
    }

    function update() {
        $query = "
            UPDATE book 
            SET name = '".$this->name."', author = '".$this->author."' 
            WHERE id = ".$this->id.";
            ";
        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }

    function delete() {
        $query = "DELETE FROM book WHERE id = ".$this->id.";";
        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }
}