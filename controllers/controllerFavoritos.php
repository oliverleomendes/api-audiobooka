<?php

require_once '../services/conexaoDB.php';
require_once '../models/modelFavoritos.php';

class controllerFavoritos {
    private $model;

    public function __construct() {
        $db = (new conexaoDB())->getConnection();
        $this->model = new modelFavoritos($db);
    }

    public function listar($id_usuario) {
        return $this->model->getByUser($id_usuario);
    }

    public function criar($data) {
        return $this->model->create($data);
    }

    public function remover($id_usuario, $id_livro) {
        return $this->model->delete($id_usuario, $id_livro);
    }
}