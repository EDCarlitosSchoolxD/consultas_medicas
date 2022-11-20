<?php


function conectarDB(){
    $mysql = new mysqli('localhost','root','','consultas_medicas');

    if(!$mysql)echo "error";
    
    return $mysql;

}