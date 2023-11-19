<?php
// Controllers/ItemController.php
namespace Controllers;

use Classes\Item;

class ItemController {
    public function criarItem($lista_id, $nome, $quantidade, $valor) {
        $item = new Item($lista_id, $nome, $quantidade, $valor);
        $item->criarItem();
        // Redirecionar para alguma página após a criação do item
    }

    public function listarItensPorLista($lista_id) {
        return Item::listarItensPorLista($lista_id);
    }

    public function atualizarItem($id, $nome, $quantidade, $valor) {
        $item = new Item('', $nome, $quantidade, $valor);
        $item->atualizarItem($id);
        // Redirecionar para alguma página após a atualização do item
    }

    public function apagarItem($id) {
        $item = new Item('', '', '', '');
        $item->apagarItem($id);
        // Redirecionar para alguma página após a exclusão do item
    }
}
