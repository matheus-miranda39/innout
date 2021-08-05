<?php
loadModel('Login');
session_start(); //Habilita a váriavel $_SESSION que guarda qual usuario está logado
$exception = null;

if(count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        $_SESSION['user'] = $user;
        header("Location: day_records.php"); //altera a URL para o day_records -> tela inicial
    }catch(AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' => $exception]);