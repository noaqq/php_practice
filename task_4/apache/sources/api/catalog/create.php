<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/connect.php";

include_once "../models/catalog.php";

$database = new Database();
$db = $database->get_connection();
$catalog = new catalog($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->name) &&
    !empty($data->author)
) {
    $catalog->name = $data->name;
    $catalog->author = $data->author;

    $result = $catalog->create();

    if ($result) {
        http_response_code(201);
        echo json_encode(array("message" => "Position added to catalog"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Unable to add position to catalog"), JSON_UNESCAPED_UNICODE);
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to add position to catalog. Data is not valid"), JSON_UNESCAPED_UNICODE);
}

