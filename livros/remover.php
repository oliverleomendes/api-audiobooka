<?php

require_once '../controllers/controllerLivros.php';

if($_SERVER['REQUEST_METHOD'] == "DELETE") {

    $query = $_SERVER["QUERY_STRING"];
    parse_str($query, $params);

    $id = $params["id"];

    $controllerLivros = new controllerLivros();
    echo json_encode($controllerLivros->remover($id));

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}