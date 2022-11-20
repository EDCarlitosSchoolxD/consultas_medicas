<?php

namespace App;

use mysqli;

class ActiveRecord{

    public static mysqli $db;

   
    public static function setDB(mysqli $db){
        self::$db = $db;
    }

}