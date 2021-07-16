<?php

require_once(MODEL_PATH . '/Model.php');

class User extends Model {
    protected static $tableName = 'Users';
    protected static $columns = [
        'id',
        'namne',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin',
    ];
}