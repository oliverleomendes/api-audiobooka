<?php

require_once '../controllers/controllerLivros.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $controllerLivros = new controllerLivros();
    echo json_encode($controllerLivros->criar($data));

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}