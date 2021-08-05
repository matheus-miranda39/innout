<?php
    require_once(dirname(__FILE__, 2) . '/src/config/config.php');
    $uri = urldecode($_SERVER['REQUEST_URI']); // mostra a url no momento da requisição desta página(inicial)

    if($uri === '/' || $uri === '' || $uri === '/index.php') {
        $uri = '/day_records.php'; //<-- tela inicial
    }
        
    require_once(CONTROLLER_PATH . "/{$uri}");
?>