<?php
// Core/Router.php
namespace Core;

class Router {
    private $routes = [];

    // Método para adicionar rotas
    public function addRoute($route, $controller) {
        $this->routes[$route] = $controller;
    }

    // Método para direcionar a requisição para o controlador apropriado
    public function route($url) {
        $urlParts = explode('/', $url);
        $route = $urlParts[0];

        if (array_key_exists($route, $this->routes)) {
            $controllerName = $this->routes[$route];
            $methodName = $urlParts[1] ?? 'index'; // Método padrão, se não especificado na URL

            // Incluir o arquivo do controlador
            require_once "Controllers/$controllerName.php";

            // Instanciar o controlador e chamar o método apropriado
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            // Rota não encontrada
            echo "404 - Rota não encontrada";
        }
    }
}
