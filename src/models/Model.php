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

    //Serve para pegar TODOS os dados do banco com os filtros determinados
    public static function get($filters = [], $columns = '*'){ 
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if($result){
            $class = get_called_class(); //Mostra a classe que chamou esse metodo -> get(filters, colums) 
            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    public static function getResultSetFromSelect($filters = [], $columns = "*"){
        $sql = "SELECT ${columns} FROM "  
        . static::$tableName //já pega o nome da tabela que estiver referenciado na herança
        . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0){
            return null;
        } else {
            return $result;
        }
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