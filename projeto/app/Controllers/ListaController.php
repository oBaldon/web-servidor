<?php
// Controllers/ListaController.php
namespace Controllers;

use Classes\Lista;

class ListaController {
    public function criarLista($usuario_login, $titulo, $data) {
        $lista = new Lista($usuario_login, $titulo, $data);
        $lista->criarLista();
        // Aqui você pode redirecionar para alguma página após a criação da lista
    }

    public function listarListasPorUsuario($usuario_login) {
        return Lista::listarListasPorUsuario($usuario_login);
    }

    public function atualizarLista($id, $titulo, $data) {
        $lista = new Lista('', $titulo, $data);
        $lista->atualizarLista($id);
        // Aqui você pode redirecionar para alguma página após a atualização da lista
    }
    
    public function apagarLista($id) {
        $lista = new Lista('', '', '');
        $lista->apagarLista($id);
        // Aqui você pode redirecionar para alguma página após a exclusão da lista
    }
    
}
