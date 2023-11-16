<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xamp\htdocs');
spl_autoload_register();

$controller = 'Controller_' . $_GET['c'];
$metodo = $_GET['m'] ?? 'main';

$obj = new $controller();
$obj->$metodo();