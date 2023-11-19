<?php
// Classes/Lista.php
namespace Classes;

use Config\Database; // Supondo que você tenha uma classe para lidar com o banco de dados

class Lista {
    private $id;
    private $usuario_login;
    private $titulo;
    private $data;

    public function __construct($usuario_login, $titulo, $data) {
        $this->usuario_login = $usuario_login;
        $this->titulo = $titulo;
        $this->data = $data;
    }

    // Método para criar uma nova lista
    public function criarLista() {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para inserir a nova lista na tabela 'listas'
        // Use prepared statements para segurança
        // Exemplo: $db->query("INSERT INTO listas (usuario_login, titulo, data) VALUES (?, ?, ?)", [$this->usuario_login, $this->titulo, $this->data]);
    }

    // Método para listar todas as listas de um usuário
    public static function listarListasPorUsuario($usuario_login) {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para selecionar todas as listas do usuário da tabela 'listas'
        // Exemplo: $result = $db->query("SELECT * FROM listas WHERE usuario_login = ?", [$usuario_login]);
        // Retorne os resultados
    }

    // Método para atualizar informações de uma lista existente
    public function atualizarLista($id) {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para atualizar informações da lista na tabela 'listas'
        // Exemplo: $db->query("UPDATE listas SET titulo = ?, data = ? WHERE id = ?", [$this->titulo, $this->data, $this->id]);
    }

    // Método para apagar uma lista
    public function apagarLista($id) {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para apagar a lista da tabela 'listas'
        // Exemplo: $db->query("DELETE FROM listas WHERE id = ?", [$this->id]);
    }
}
