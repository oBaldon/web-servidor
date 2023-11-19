<?php
// Core/App.php
namespace Core;

use Controllers\UsuarioController;
use Controllers\ListaController;
use Controllers\ItemController;

class App {
    public function run() {
        // Obter a rota e os parâmetros da URL (pode variar dependendo da sua implementação)
        $route = $_GET['route'] ?? '/';
        $params = explode('/', $route);

        // Definir os controladores
        $usuarioController = new UsuarioController();
        $listaController = new ListaController();
        $itemController = new ItemController();

        // Definir rotas e ações baseadas nos parâmetros da URL
        switch ($params[0]) {
            case 'criarUsuario':
                $usuarioController->criarUsuario($params[1], $params[2], $params[3]);
                break;
            case 'listarUsuarios':
                $usuarios = $usuarioController->listarUsuarios();
                // Processar a listagem de usuários
                break;
            case 'criarLista':
                $listaController->criarLista($params[1], $params[2], $params[3]);
                break;
            // Mais rotas e ações podem ser adicionadas conforme necessário
            default:
                // Página padrão ou tratamento de erro
                break;
        }
    }
}

$app = new App();
$app->run();
