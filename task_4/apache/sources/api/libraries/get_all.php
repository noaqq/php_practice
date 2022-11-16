<?php

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/connect.php";
include_once "../models/libraries.php";

$database = new Database();
$db = $database->get_connection();

$libraries = new libraries($db);

$query_result = $libraries->get_all();

$result = array("results" => array());
foreach ($query_result as $libraries) {
    $librariess_obj = array(
        "id" => $libraries["id"],
        "name" => $libraries["name"],
        "address" => $libraries["address"]
    );
    $result["results"][] = $librariess_obj;
}

http_response_code(200);
echo json_encode($result);