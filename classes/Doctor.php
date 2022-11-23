<?php
namespace App;

class Doctor extends ActiveRecord{

    public static string $table = "doctores";
    public static array $columnas = ['nombre','apellido_paterno','apellido_materno','id_especialidad'];
    

    public int $id;
    public string $nombre;
    public string $apellido_materno;
    public string $apellido_paterno;
    public string $id_especialidad;
   

    public function __construct($args=[])
    {

        $this->nombre = $args['nombre'] ?? '';
        $this->apellido_materno = $args['apellido_materno'] ?? '';
        $this->apellido_paterno = $args['apellido_paterno'] ?? '';
        $this->id_especialidad = $args['id_especialidad'] ?? '';

    }


}