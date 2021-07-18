<?php
    require_once(dirname(__FILE__, 2) . '/src/config/config.php'); //o (,2) significa que irá pegar o PAI(INNOUT) do arquivo atual(public)
    require_once(dirname(__FILE__, 2) . '/src/models/User.php'); //o (,2) significa que irá pegar o PAI(INNOUT) do arquivo atual(public)

    $user = new User(['name' => 'Lucas', 'email' => 'lucas@cod3r.com.br']);
    print_r(User::get(['id' => 1], 'name, email'));
    echo "<br>";
    print_r(User::get(['name' => 'Chaves'], 'id, name, email'));
    echo "<br>";
    print_r(User::get(['name' => 'Chaves']));
    echo "<br>";
    print_r(User::get());

?>