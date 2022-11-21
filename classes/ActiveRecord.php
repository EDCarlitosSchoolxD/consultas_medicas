<?php

namespace App;

use mysqli;
use mysqli_result;

class ActiveRecord{

    public static mysqli $db;
    public static string $table;
    public static array $columnas = [];

   


    public function save(){
        try {
            $query = "INSERT INTO ". static::$table;
            $query .= "(". join(',',static::$columnas) . ")";
            $query .= " VALUES('". join("','",$this->getProperties()) . "')";

            $resultado = self::$db->query($query);
            return $resultado;

        } catch (\Throwable $th) {
            echo "Algo salio mal";
        }

    }


    public static function where($columna,$operacion,$valor){

        $query = "SELECT * FROM ".static::$table;
        $query .= " WHERE $columna $operacion ". "'$valor'";
        $resultado = self::$db->query($query);
        

        $array = [];
        while($res = $resultado->fetch_assoc()){
            $array[]= static::createObjects($res);
        }

        $resultado->free();

        return $array;
    }

    public static function find($id){
        $query = "SELECT * FROM ". static::$table . " WHERE id = ". $id;
        $resultado = self::$db->query($query);

        $array = [];
        while($res = $resultado->fetch_assoc()){
            $array[]= static::createObjects($res);
        }

        $resultado->free();

        return $array;
    }

    protected static function createObjects($resultado){
        $objeto = new static;

        foreach($resultado as $key =>$value){
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
 
    }

    public function getProperties(){
        $array = [];

        foreach(static::$columnas as $columna){
            $array[$columna] = $this->$columna;
        }

        return $array;
    }

    public static function setDB(mysqli $db){
        self::$db = $db;
    }

}