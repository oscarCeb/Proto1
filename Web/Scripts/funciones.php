<?php
$dbname = 'social';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($connection->connect_error) die("Fatal error 1");


function consultarMysql($consulta) {
    global $connection;
    $result = $connection->query($consulta);
    
    if(!$result) die("Fatal error 2");
    return $result;
}

function destruirSesion(){

    $_SESSION = array();
    if(session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(),'', time()-2592000,'/');
    session_destroy();
    
}


function sanitizarString($var){

    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);

}

function crearTabla($nombre, $consulta) {

    consultarMysql("CREATE TABLE IF NOT EXISTS $nombre ($consulta)");
    echo "La tabla '$nombre' fue creada con éxito o ya existe.";

}



?>