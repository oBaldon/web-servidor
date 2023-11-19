<?php
// Classes/Item.php
namespace Classes;

use Config\Database; // Supondo que você tenha uma classe para lidar com o banco de dados

class Item {
    private $id;
    private $lista_id;
    private $nome;
    private $quantidade;
    private $valor;

    public function __construct($lista_id, $nome, $quantidade, $valor) {
        $this->lista_id = $lista_id;
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->valor = $valor;
    }

    // Método para criar um novo item
    public function criarItem() {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para inserir o novo item na tabela 'itens'
        // Use prepared statements para segurança
        // Exemplo: $db->query("INSERT INTO itens (lista_id, nome, quantidade, valor) VALUES (?, ?, ?, ?)", [$this->lista_id, $this->nome, $this->quantidade, $this->valor]);
    }

    // Método para listar todos os itens de uma lista
    public static function listarItensPorLista($lista_id) {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para selecionar todos os itens da lista da tabela 'itens'
        // Exemplo: $result = $db->query("SELECT * FROM itens WHERE lista_id = ?", [$lista_id]);
        // Retorne os resultados
    }

    // Método para atualizar informações de um item existente
    public function atualizarItem($id) {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para atualizar informações do item na tabela 'itens'
        // Exemplo: $db->query("UPDATE itens SET nome = ?, quantidade = ?, valor = ? WHERE id = ?", [$this->nome, $this->quantidade, $this->valor, $this->id]);
    }

    // Método para apagar um item
    public function apagarItem($id) {
        $db = new Database(); // Substitua pelo seu código para conexão com o banco de dados
        // Implemente a lógica para apagar o item da tabela 'itens'
        // Exemplo: $db->query("DELETE FROM itens WHERE id = ?", [$this->id]);
    }
}
