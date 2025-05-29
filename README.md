# 📚 API Audiobook

API RESTful para gerenciamento de audiobooks, capítulos, usuários e favoritos, desenvolvida em PHP com estrutura MVC e banco de dados MySQL.

---

## 🚀 Funcionalidades

- 📘 CRUD completo de Livros
- 🎧 Cadastro de capítulos por livro
- ❤️ Sistema de favoritos por usuário
- 👤 Cadastro e login de usuários (autenticação futura)
- 🔗 Integração com app React Native via `fetch`

---

## 🗂 Estrutura do Projeto

```
api-audiobooka/
├── services/               # Conexão com o banco (database.php)
├── controllers/            # Controllers REST (Usuário, Livros, Favoritos)
├── models/                 # Models com lógica SQL (CRUDs)
├── livros/                 # View de consumo de livros
├── favoritos/              # View de consumo de favoritos
├── usuarios/               # View de consumo de usuarios
└── database.sql            # Script para criação das tabelas
```

---

## 🛠 Tecnologias

- PHP 7+
- MySQL
- Padrão MVC
- RESTful API
- CORS habilitado

---

## 🔧 Configuração

1. Clone o repositório:
   ```bash
   git clone https://github.com/oliverleomendes/api-audiobooka.git
   ```

2. Configure seu banco MySQL:

   - Crie um banco de dados (ex: `audiobooks`)
   - Importe o arquivo `database.sql`

3. Edite o arquivo `config/database.php` com seus dados de conexão:

   ```php
   private $host = 'localhost';
   private $db_name = 'audiobooks';
   private $username = 'root';
   private $password = '';
   ```

4. Execute os endpoints via navegador ou ferramenta como Postman.

---

## 📡 Endpoints Principais

### Livros
- `GET /livros/listar.php` → lista todos os livros
- `GET /livros/listar.php?id=1` → retorna livro com capítulos
- `POST /livros/criar.php` → cria novo livro
- `PUT /livros/atualizar.php?id=1` → atualiza livro
- `DELETE /livros/deletar.php?id=1` → remove livro

### Favoritos
- `GET /favoritos/listar.php?id_usuario=1`
- `POST /favoritos/adicionar.php`
- `DELETE /favoritos/remover.php?id_usuario=1&id_livro=2`

---

## 📲 Integração com App React Native

Você pode consumir esta API usando `fetch` ou bibliotecas como Axios em apps móveis ou web. Exemplo:

```ts
const res = await fetch("http://localhost/api-audiobooka/livros/listar.php");
const data = await res.json();
```

---

## 📌 Autor

**Leonardo Mendes**  
🔗 [linkedin.com/in/oliverleomendes](https://linkedin.com/in/oliverleomendes)

---

## ⚖️ Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.