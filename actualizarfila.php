<?php
session_start();
require "connect.php";

// Solo Admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    // Acción que el admin quiere realizar
    $accion = $_POST['accion'];

    // Obtener BD
    $sql = "SELECT * FROM atracciones WHERE id = $id";
    $result = $conexion->query($sql);
    $atraccion = $result->fetch_assoc();

    $personas = $atraccion['personas'];
    $cupo = $atraccion['cupo'];
    $duracion = $atraccion['duracion'];

    if ($accion == "agregar") {

        //Cantidad enviada
        $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;
        $personas += $cantidad;

    } elseif ($accion == "vaciar") {

        $personas = 0;
    }

    // No valores negativos
    if ($personas < 0) {
        $personas = 0;
    }

    // Calculo: Se divide la cantidad de personas entre el cupo por ciclo y se multiplica por la duración del ciclo
    if ($cupo > 0) {
        $grupos = ceil($personas / $cupo);
        $tiempo = $grupos * $duracion;
    } else {
        $tiempo = 0;
    }

    // Actualiza BD
    $update = "UPDATE atracciones 
               SET personas = $personas,
                   tiempo_espera = $tiempo
               WHERE id = $id";

    $conexion->query($update);

    // Regresar

    header("Location: filas.php");
    exit();
}
?>