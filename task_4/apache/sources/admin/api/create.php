<?php
if (isset($_GET['name']) && isset($_GET['type'])) {
    $name = $_GET['name'];
    $type = $_GET['type'];
    switch ($type) {
        case 'library':
            $address = $_GET['address'];
            $mysqli = new mysqli("db", "mysql", "123456", "app_db");
            $result = $mysqli->query("INSERT INTO $type VALUES (Null, '$name', '$address')");
            break;
        case 'book':
            $author = $_GET['author'];
            $mysqli = new mysqli("db", "mysql", "123456", "app_db");
            $result = $mysqli->query("INSERT INTO $type VALUES (Null, '$name', '$author')");
            break;
    }
    header("Location: /admin/admin.php");
} else {
    echo "Bad request";
}
