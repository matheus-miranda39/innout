<?php
    require_once(dirname(__FILE__, 2) . '/src/config/config.php');
    $uri = urldecode($_SERVER['REQUEST_URI']); // mostra a url no momento da requisição desta página(inicial)

    if($uri === '/' || $uri === '' || $uri === '/index.php') {
        $uri = '/login.php';
    }
        
    require_once(CONTROLLER_PATH . "/{$uri}");
?>