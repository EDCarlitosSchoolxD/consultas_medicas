<?php

namespace App;

class Cita extends ActiveRecord{

    public static string $table = "citas";
    public static array $columnas = ['nombres','apellido_paterno','apellido_materno','horario','id_doctor','id_usuario','mensaje'];
    

    public int $id;
    public string $nombres;
    public string $apellido_materno;
    public string $apellido_paterno;
    public string $id_doctor;
    public string $id_usuario;
    public string $horario;
    public string $mensaje;
   

    public function __construct($args=[])
    {

        $this->nombres = $args['nombres'] ?? '';
        $this->apellido_materno = $args['apellido_materno'] ?? '';
        $this->apellido_paterno = $args['apellido_paterno'] ?? '';
        $this->id_doctor = $args['id_doctor'] ?? '';
        $this->id_usuario = $_SESSION['usuarioId'] ?? '';
        $this->horario = $args['horario'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';

    }



}