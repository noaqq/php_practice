<?php

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/connect.php";
include_once "../models/catalog.php";

$database = new Database();
$db = $database->get_connection();

$catalog = new catalog($db);

$query_result = $catalog->get_all();

$result = array("results" => array());
foreach ($query_result as $catalog) {
    $catalogs_obj = array(
        "id" => $catalog["id"],
        "name" => $catalog["name"],
        "author" => $catalog["author"]
    );
    $result["results"][] = $catalogs_obj;
}

http_response_code(200);
echo json_encode($result);