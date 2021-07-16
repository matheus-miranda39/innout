<?php
    require_once(dirname(__FILE__, 2) . '/src/config/config.php'); //o (,2) significa que irá pegar o PAI(INNOUT) do arquivo atual(public)
    require_once(dirname(__FILE__, 2) . '/src/models/User.php'); //o (,2) significa que irá pegar o PAI(INNOUT) do arquivo atual(public)

    $user = new User(['name' => 'Lucas', 'email' => 'lucas@cod3r.com.br']);
    //echo $user->getSelect('id, nome') . "<br>";
    echo User::getSelect(['id' => 1], 'name, email') . '<br>';
    echo User::getSelect(['name' => 'Chaves']) . '<br>';
    echo User::getSelect(['id' => 1, 'name' => 'Chaves'], 'name, email');
?>