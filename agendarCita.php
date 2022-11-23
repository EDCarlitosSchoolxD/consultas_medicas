<?php

include('./includes/App.php');

use App\Cita;


if($_POST){

    $_post = json_decode(file_get_contents('php://input'),true);

    $cita = new Cita($_post);
    $cita->save();
    echo "Guardado correctamente";
    exit;
}

echo "Algo fallo";
exit;