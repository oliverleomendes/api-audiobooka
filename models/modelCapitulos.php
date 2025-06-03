<?php

class modelCapitulos {
    private $conn;
    private $table = "capitulos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getById($id_capitulo) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id_capitulo = ?");
        $stmt->prepare([$id_capitulo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByLivro($id_livro) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id_livro = ?");
        $stmt->execute([$id_livro]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (id_livro, title, audio_url, posicao)
                                        VALUES (?, ?, ?, ?)");
        $stmt->execute([$data["id_livro"], $data["titulo"], $data["audio_url"], $data["posicao"]]);
        return json_encode(["message" => "Capítulo criado ", "id" => $this->conn->lastInsertId()]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET title = ?, audio_url = ?, posicao = ?
                                        WHERE id_capitulo = ?");
        $stmt->execute([$data["titulo"], $data["audio_url"], $data["posicao"], $id]);
        return json_encode(["message" => "Capítulo atualizado"]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id_capitulo = ?");
        $stmt->execute([$id]);
        return json_encode(["message" => "Capítulo removido"]);
    }
}