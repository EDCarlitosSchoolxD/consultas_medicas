<?php

function debuguear($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function redirect($url){
    header("Location: $url");
}