<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/connect.php";
include_once "../models/libraries.php";

$database = new Database();
$db = $database->get_connection();

$libraries = new libraries($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->id) &&
    !empty($data->name) &&
    !empty($data->address)
) {
    $libraries->id = $data->id;
    $libraries->name = $data->name;
    $libraries->address = $data->address;

    $stmt = $libraries->update();

    if ($stmt) {
        http_response_code(201);
        echo json_encode(array("message" => "libraries update"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Unable to update libraries"), JSON_UNESCAPED_UNICODE);
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable update libraries. Data is not valid"), JSON_UNESCAPED_UNICODE);
}

