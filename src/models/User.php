<?php

require_once(MODEL_PATH . '/Model.php');

class User extends Model {
    protected static $tableName = 'users'; //nome da tabela
    protected static $columns = [ //colunas do SQL
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin',
    ];
}