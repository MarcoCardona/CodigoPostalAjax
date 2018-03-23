<?php

$conexion = mysqli_connect("localhost", "root", "", "sistem40_ulinea");

$query = "SELECT * FROM sepomex where cp=".$_REQUEST['cp'];
$respuesta = mysqli_query($conexion, $query);
$datos = array();
while ($fila = mysqli_fetch_array($respuesta)) {
    $datos[] = (
            array(
                "municipio" => utf8_decode($fila['municipio']),
                "estado" => utf8_decode($fila['estado']), 
                "asentamiento" => utf8_decode($fila['asentamiento'])
            )
    );
}
echo json_encode($datos);
?>
