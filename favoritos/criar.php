<?php

require_once '../controllers/controllerFavoritos.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerFavoritos = new controllerFavoritos();
    echo json_encode($controllerFavoritos->criar($data));

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}