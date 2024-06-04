<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "gameverse");

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        throw new Exception("Error de conexión: " . $conn->connect_error);
    }

    //La conexion es exitosa y se pueden realizar operaciones
    //echo "Conexión exitosa a la base de datos\n";

    //prueba de operaciones borrar despues
    //$query = mysqli_query($conn, "SELECT concat(tipo_usuario,id) codigo,nombre FROM usuarios WHERE tipo_usuario = 'ADM'");

    //$result = mysqli_fetch_array($query);
   
    //echo "<br>Codigo: ".$result['codigo'];
    //echo "<br>Usuario: ".$result['nombre'];

    //$result = null;
    //fin de la prueba, como la conexion va a ser un include se cerrara la conexion en los otros archivos

} catch (Exception $e) {
    // mensaje de que fue lo que fallo
    die("Oh no, tu skill issue dio como resultado el error: " . $e->getMessage());
}
?>