<?php
    require_once "funciones.php";
    if($_POST["user"]){
        $user = sanitizarString($_POST["user"]);
        $resultado = consultarMysql("SELECT * FROM users WHERE user = '$user'");
        if($resultado -> num_rows){
            echo "El usuario <b>$user</b> ya existe";
        }else{
            echo "";
        }
    }


?>