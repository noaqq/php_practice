<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/connect.php";
include_once "../models/libraries.php";

$database = new Database();
$db = $database->get_connection();

$libraries = new libraries($db);

if (!isset($_GET["id"])) {
    http_response_code(400);
    echo json_encode(array("message" => "Bad request. Id is not set"));
} else {
    $libraries->id = $_GET["id"];
    $stmt = $libraries->delete();
    if ($stmt) {
        http_response_code(200);
        echo json_encode(array("message" => "libraries deleted"));
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "libraries not found"));
    }
}
