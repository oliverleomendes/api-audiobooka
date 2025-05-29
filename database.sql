-- Banco de dados para o app AudiobookApp

CREATE DATABASE IF NOT EXISTS audiobookapp;
USE audiobookapp;

-- Tabela de usuários
CREATE TABLE usuarios (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nomeusuario VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL,
  email VARCHAR(100),
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de audiobooks
CREATE TABLE livros (
  id_livro INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100) NOT NULL,
  autor VARCHAR(100),
  capa_url TEXT,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de capítulos
CREATE TABLE capitulos (
  id_capitulo INT AUTO_INCREMENT PRIMARY KEY,
  id_livro INT NOT NULL,
  title VARCHAR(100) NOT NULL,
  audio_url TEXT NOT NULL,
  posicao INT DEFAULT 1,
  FOREIGN KEY (id_livro) REFERENCES livros(id_livro) ON DELETE CASCADE
);

-- Tabela de favoritos
CREATE TABLE favoritos (
  id_favoritos INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_livro INT NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE (id_usuario, id_livro),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
  FOREIGN KEY (id_livro) REFERENCES livros(id_livro) ON DELETE CASCADE
);

-- Tabela de progresso por capítulo
CREATE TABLE progresso (
  id_progresso INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_capitulo INT NOT NULL,
  posicao_seg INT DEFAULT 0,
  atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE (id_usuario, id_capitulo),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
  FOREIGN KEY (id_capitulo) REFERENCES capitulos(id_capitulo) ON DELETE CASCADE
);