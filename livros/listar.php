<?php

require_once '../controllers/controllerLivros.php';

if($_SERVER['REQUEST_METHOD'] == "GET") {

    $id = $_GET['id'] ?? null;

    $controllerLivros = new controllerLivros();
    echo json_encode(["livros" => $controllerLivros->listar($id)]);

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}