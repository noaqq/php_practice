<?php

class libraries {
    private ?mysqli $conn;

    public int $id;
    public ?string $name;
    public ?string $address;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->address = htmlspecialchars(strip_tags($this->address));

        $query = "INSERT INTO libraries(name, address) VALUE ('".$this->name."', '".$this->address."');";

        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }

    function get() {
        $query = "SELECT l.id, l.name, l.address FROM libraries AS l WHERE v.id = ".$this->id.";";

        $result = $this->conn->query($query)->fetch_row();
        return $result;
    }

    function get_all() {
        $query = "SELECT * FROM libraries;";
        $result = $this->conn->query($query);
        return $result;
    }

    function update() {
        $query = "
            UPDATE libraries 
            SET name = '".$this->name."', address = '".$this->address."' 
            WHERE id = ".$this->id.";
            ";
        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }

    function delete() {
        $query = "DELETE FROM libraries WHERE id = ".$this->id.";";
        $result = $this->conn->query($query);
        $this->conn->commit();
        return $result;
    }
}