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
    
    //Serve para pegar APENAS UM usuario do banco com os filtros determinados
    public static function getOne($filters = [], $columns = '*'){ 
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);
        return $result ? new $class($result->fetch_assoc()) : null;
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

    //Cadastra um usuario
    public function save(){
        $sql = "INSERT INTO" . static::$tableName . " ("
            . implode(",", static::$columns) . ") VALUES (";
        foreach(static::$columns as $col) {
            $sql .= static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = ')'; //serve para garantir que o ultimo caractere do sql não seja uma virgula
        $id = Database::executeSQL($sql); //executa o $sql e retorna o id do usuario cadastrado
        $this->id = $id;
    }

    private static function getFilters($filters){
        $sql = '';
        if(count($filters) > 0){
            $sql .= " WHERE 1 = 1"; //serve para que o proximo comando não seja um 'AND'
            foreach($filters as $column => $value) {
                $sql .= " AND ${column} = " . static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    // as vezes é necessário passar por uma formatação antes de ir para o SQL
    private static function getFormatedValue($value){
        if(is_null($value)){
            return "null";
        } elseif(gettype($value) === 'string'){
            return "'${value}'"; //se for string o SQL precisa dele entre aspas simples
        } else {
            return $value; //caso contrario vai no modo natural
        }
    }
}