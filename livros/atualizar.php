<?php

require_once '../controllers/controllerLivros.php';

if($_SERVER["REQUEST_METHOD"] == "PUT") {

    $query = $_SERVER["QUERY_STRING"];
    parse_str($query, $params);

    $id = $params["id"];

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerLivros = new controllerLivros();
    echo json_encode($controllerLivros->atualizar($id, $data));

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido."]);
}