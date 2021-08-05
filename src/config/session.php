<?php

function requireValidSection() {
    $user = $_SESSION['user']; //guarda a sessão do usuario
    if(!isset($user)) { //se não estiver nada...
        header('Location: login.php');
        exit();
    }
}