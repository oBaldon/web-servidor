<?php
// Classes/Usuario.php
namespace Classes;

use Config\Database; // Supondo que você tenha uma classe para lidar com o banco de dados

class Usuario {
    private $login;
    private $senha;
    private $email;

    public function __construct($login, $senha, $email) {
        $this->login = $login;
        $this->senha = $senha;
        $this->email = $email;
    }

    // Método para criar um novo usuário
    public function criarUsuario() {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para inserir o novo usuário na tabela 'usuarios'
        // Use prepared statements para segurança
        // Exemplo: $db->query("INSERT INTO usuarios (login, senha, email) VALUES (?, ?, ?)", [$this->login, $this->senha, $this->email]);
    }

    // Método para listar todos os usuários
    public static function listarUsuarios(): array {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para selecionar todos os usuários da tabela 'usuarios'
        // Exemplo: $result = $db->query("SELECT * FROM usuarios");
        // Retorne os resultados
        return [];
    }

    // Método para atualizar informações de um usuário existente
    public function atualizarUsuario() {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para atualizar informações do usuário na tabela 'usuarios'
        // Exemplo: $db->query("UPDATE usuarios SET senha = ?, email = ? WHERE login = ?", [$this->senha, $this->email, $this->login]);
    }

    // Método para apagar um usuário
    public function apagarUsuario() {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para apagar o usuário da tabela 'usuarios'
        // Exemplo: $db->query("DELETE FROM usuarios WHERE login = ?", [$this->login]);
    }
}
