<?php

require_once '../controllers/controllerFavoritos.php';

if($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $id_usuario = $_GET["id_usuario"];
    $id_livro = $_GET["id_livro"];

    $controllerFavoritos = new controllerFavoritos();
    echo json_encode($controllerFavoritos->remover($id_usuario, $id_livro));

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}