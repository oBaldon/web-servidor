<?php
spl_autoload_register(function($classe){
    //echo "Autoload {$classe}\r\n";
    require_once str_replace("\\", DIRECTORY_SEPARATOR, $classe) . ".php";
});

use Http\Request\{GetRequest, PostRequest};

$get = new GetRequest();
$post = new PostRequest();
