<?php

require_once '../controllers/controllerFavoritos.php';

if($_SERVER['REQUEST_METHOD'] == "GET") {

    $id_usuario = $_GET['id_usuario'];

    $controllerFavoritos = new controllerFavoritos();
    echo json_encode(["favoritos" => $controllerFavoritos->listar($id_usuario)]);

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}