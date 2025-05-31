<?php

require_once '../controllers/controllerCapitulos.php';

if($_SERVER["REQUEST_METHOD"] == "PUT") {

    $query = $_SERVER["QUERY_STRING"];
    parse_str($query, $params);

    $id_capitulo = $params["id_capitulo"];

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerCapitulos = new controllerCapitulos();
    echo json_encode($controllerCapitulos->atualizar($id_capitulo, $data));

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}