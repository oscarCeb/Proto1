<?php

require_once 'funciones.php';
$user = $pass = $pass2 = $error = "";

if (isset($_SESSION["user"])) {
    destruirSesion();
}
if (isset($_POST["username"])) {
    $user = sanitizarString($_POST["username"]);
    $pass = sanitizarString($_POST["password"]);
    $pass2 = sanitizarString($_POST["confirmarPass"]);
    if ($user == "" || $pass2 == "" || $pass2 == "") {
        $error = "Hay campos vacíos";
    } else {
        if ($pass != $pass2) {
            $error = "Las contraseñas no coinciden";
        } else {
            $result = consultarMysql("SELECT * FROM users WHERE user = '$user'");
            if ($result->num_rows) {
                $error = "El usuario ya existe";
            } else {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                consultarMysql("INSERT INTO users VALUES ('$user', '$pass')");
                die("Cuenta creada");
            }
        }
    }
}

echo $error;