<?php

// Conexión a la base de datos
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

// Después de actualizar, regresa al panel de administración
header("Location: comidadmin.php");
exit();
?>