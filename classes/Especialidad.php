<?php

namespace App;

class Especialidad extends ActiveRecord{

    public static string $table = "especialidades";
    public static array $columnas = ['especialidad'];
    

    public int $id;
    public string $especialidad;
   

    public function __construct($args=[])
    {

        $this->especialidad = $args['especialidad'] ?? '';
    

    }

}