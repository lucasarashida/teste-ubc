<?php

class Conexao {
    
    public static $connect;

    public static function get_connect(){
        $connect = mysqli_connect('localhost', 'root', '', 'crud_ubc');
        return $connect;
    }
}

?>