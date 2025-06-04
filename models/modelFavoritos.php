<?php

class modelFavoritos {
    private $conn;
    private $table = "favoritos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getByUser($id_usuario) {
        $stmt = $this->conn->prepare("SELECT id_livro FROM " . $this->table . " WHERE id_usuario = ?");
        $stmt->execute([$id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (id_usuario, id_livro) VALUES (?, ?)");
        $stmt->execute([$data['id_usuario'], $data['id_livro']]);
        return ["message" => "Favorito adicionado"];
    }

    public function delete($id_usuario, $id_livro) {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id_usuario = ? AND id_livro = ?");
        $stmt->execute([$user_id, $id_livro]);
        return ["message" => "Favorito removido"];
    }
}