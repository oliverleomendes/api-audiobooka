<?php

require_once '../services/conexaoDB.php';
require_once '../models/modelLivros.php';

class controllerLivros {
    private $model;

    public function __construct() {
        $db = (new conexaoDB())->getConnection();
        $this->model = new modelLivros($db);
    }

    public function listar($id = null) {
        if($id) {
            return $this->model->getById($id);
        }

        return $this->model->getAll();
    }

    public function criar($data) {
        return $this->model->create($data);
    }

    public function atualizar($id, $data) {
        return $this->model->update($id, $data);
    }

    public function remover($id) {
        return $this->model->delete($id);
    }
}