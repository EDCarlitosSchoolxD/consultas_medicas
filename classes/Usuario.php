<?php

namespace App;

class Usuario extends ActiveRecord{

    public static string $table = "usuarios";
    public static array $columnas = ['usuario','email','telefono','contrasenna'];
    

    public int $id;
    public string $usuario;
    public string $email;
    public string $telefono;
    public string $contrasenna;

    public function __construct($args=[])
    {
        $hashPassword = password_hash($args['contrasenna'] ?? '',PASSWORD_DEFAULT);

        $this->usuario = $args['usuario'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->contrasenna = $hashPassword ?? '';
    }


    public static function login($args){
        $usuario = static::where('email','=',$args['email']);

        if(password_verify($args['contrasenna'],$usuario[0]->contrasenna)){
            $_SESSION['usuarioId'] = $usuario[0]->id;
            $_SESSION['usuario'] = $usuario[0]->usuario;
            header('Location: /');
        }else{
            header('Location: login.php');
        }
        
    }



}