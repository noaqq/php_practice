<?php
if (isset($_GET['name']) && isset($_GET['type']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $type = $_GET['type'];
    switch ($type) {
        case 'library':
            $address = $_GET['address'];
            $mysqli = new mysqli("db", "mysql", "123456", "app_db");
            $result = $mysqli->query("UPDATE $type SET `name` = '$name', address = '$address' WHERE id = $id");
            break;
        case 'book':
            $author = $_GET['author'];
            $mysqli = new mysqli("db", "mysql", "123456", "app_db");
            $result = $mysqli->query("UPDATE $type SET `name` = '$name', author = '$author' WHERE id = $id");
            break;
    }
    header("Location: /admin/admin.php");
} else {
    echo "Bad request";
}
