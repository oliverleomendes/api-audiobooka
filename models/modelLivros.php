<?php

class modelLivros {
    private $conn;
    private $table = "livros";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM " . $this->table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM ". $this->table . " WHERE id_livro = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (titulo, autor, capa_url) VALUES (?, ?, ?)");
        $stmt->execute([$data["titulo"], $data["autor"], $data["capa_url"]]);
        return ["message" => "Livro criado", "id" => $this->conn->lastInsertId()];
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET titulo = ?, autor = ?, capa_url = ? WHERE id = ?");
        $stmt->execute([$data["titulo"], $data["autor"], $data["capa_url"], $id]);
        return ["message" => "Livro atualizado"];
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id = ?");
        $stmt->execute([$id]);
        return ["message" => "Livro removido"];
    }
}