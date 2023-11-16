<?php

spl_autoload_register(function ($class) {
    require_once str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
});

use Rest\Restful;
use Http\{PostRequest,GetRequest};

$type = $_GET['type'] ?? null;
$body = $_GET['body'] ?? null;
$header = $_GET['header'] ?? null;

if ($type && $body && $header) {
    if ($type === 'post') {
        $request = new PostRequest($body, $header);
    } elseif ($type === 'get') {
        $request = new GetRequest($body);
    }

    $restful = new Restful($request);
    $restful->build();
}
?>
