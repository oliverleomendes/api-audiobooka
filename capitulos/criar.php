<?php

require_once '../controllers/controllerCapitulos.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerCapitulos = new controllerCapitulos();
    echo json_encode($controllerCapitulos->criar($data));

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}