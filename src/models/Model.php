<?php

class Model {
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    function __construct($arr)
    {
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr){
        if($arr){
            foreach($arr as $key => $value){
                $this->$key = $value;
            }
        }
    }

    public function __get($key){
        return $this->values[$key];
    }

    public function __set($key, $value){
        $this->values[$key] = $value;
    }

    public static function getSelect($filters = [], $columns = "*"){
        $sql = "SELECT ${columns} FROM "  
        . static::$tableName //já pega o nome da tabela que estiver referenciado na herança
        . static::getFilters($filters);
        return $sql;
    }

    private static function getFilters($filters){
        $sql = '';
        if(count($filters) > 0){
            $sql .= " WHERE 1 = 1"; //serve para garantir que depois do where todas os parametros tenham 'AND' antes
            foreach($filters as $column => $value) {
                $sql .= " AND ${column} = " . static::getFormated($value);
            }
        }
        return $sql;
    }

    private static function getFormated($value){
        if(is_null($value)){
            return "null";
        } elseif(gettype($value) === 'string'){
            return "'${value}'"; //se for string o SQL precisa dele entre aspas simples
        } else {
            return $value; //caso contrario vai no modo natural
        }
    }
}