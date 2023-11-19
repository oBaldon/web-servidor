<?php
// Controllers/UsuarioController.php
namespace Controllers;

use Classes\Usuario;

class UsuarioController {
    public function criarUsuario($login, $senha, $email) {
        $usuario = new Usuario($login, $senha, $email);
        $usuario->criarUsuario();
        // Aqui você pode redirecionar para alguma página após a criação do usuário
    }

    public function listarUsuarios(): array {
        return Usuario::listarUsuarios();
    }

    public function atualizarUsuario($login, $senha, $email) {
        $usuario = new Usuario($login, $senha, $email);
        $usuario->atualizarUsuario();
        // Aqui você pode redirecionar para alguma página após a atualização do usuário
    }

    public function apagarUsuario($login) {
        $usuario = new Usuario($login, '', '');
        $usuario->apagarUsuario();
        // Aqui você pode redirecionar para alguma página após a exclusão do usuário
    }
}
