<?php

include __DIR__ . '/connect.php';


$id = $_POST['id'];
$estado = $_POST['estado'];
$personas = $_POST['personas_fila'];
$accion = $_POST['accion'] ?? null;

if ($accion == 'vaciar') {

    $sql = "UPDATE restaurantes 
            SET estado='$estado',
                personas_fila=0
            WHERE id=$id";

    $conexion->query($sql);

} 
else {

    $sql = "UPDATE restaurantes 
            SET estado='$estado',
                personas_fila=$personas
            WHERE id=$id";

    $conexion->query($sql);
}

header("Location: comidadmin.php");
exit();
?>