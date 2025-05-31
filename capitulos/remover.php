<?php

require_once '../controllers/controllerCapitulos.php';

if($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $id_capitulo = $_GET["id_capitulo"];

    $controllerCapitulos = new controllerCapitulos();
    echo json_encode($controllerCapitulos->remover($id_capitulo));

} else {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido"]);
}