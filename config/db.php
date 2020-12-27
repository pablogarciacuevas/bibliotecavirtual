<?php

class Database{
    static public function connect(){
        $db = new mysqli('localhost','root','','bibliotecavirtual');
        $db->query("SET NAMES 'utf-8'");

        return $db;
    }
}

?>