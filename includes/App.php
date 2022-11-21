<?php

use App\ActiveRecord;

include('./vendor/autoload.php');
require 'funciones.php';
require 'database/database.php';

$db  = conectarDB();

ActiveRecord::setDB($db);

session_start();

