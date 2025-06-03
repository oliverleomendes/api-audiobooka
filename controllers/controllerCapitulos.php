<?php

require_once '../services/conexaoDB.php';
require_once '../models/modelCapitulos.php';

class controllerCapitulos {
    private $model;

    public function __construct() {
        $db = (new conexaoDB())->getConnection();
        $this->model = new modelCapitulos($db);
    }

    public function listar($id_capitulo = null, $id_livro = null) {
        if($id_capitulo) {
            return $this->model->getById($id_capitulo);
        } else if($id_livro) {
            return $this->model->getByLivro($id_livro);
        }

        return json_encode(["message" => "Informe o id_livro ou id_capitulo"]);
    }

    public function criar($data) {
        return $this->model->create($data);
    }

    public function atualizar($id_capitulo, $data) {
        return $this->model->update($id_capitulo, $data);
    }

    public function remover($id_capitulo) {
        return $this->model->delete($id_capitulo);
    }

}