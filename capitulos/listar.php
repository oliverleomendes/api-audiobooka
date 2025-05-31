<?php

require_once '../controllers/controllerCapitulos.php';

if($_SERVER["REQUEST_METHOD"] == "GET") {

    $id_livro = $_GET["id_livro"] ?? null;
    $id_capitulo = $_GET["id_capitulo"] ?? null;

    $controllerCapitulos = new controllerCapitulos();
    echo json_encode(["capitulos" => $controllerCapitulos->listar($id_capitulo, $id_livro)]);

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}