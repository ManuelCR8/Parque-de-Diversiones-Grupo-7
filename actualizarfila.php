<?php
session_start();
require "connect.php";

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $accion = $_POST['accion'];

    $sql = "SELECT * FROM atracciones WHERE id = $id";
    $result = $conexion->query($sql);
    $atraccion = $result->fetch_assoc();

    $personas = $atraccion['personas'];
    $cupo = $atraccion['cupo'];
    $duracion = $atraccion['duracion'];

    if ($accion == "agregar") {

        $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;
        $personas += $cantidad;

    } elseif ($accion == "vaciar") {

        $personas = 0;
    }

    if ($personas < 0) {
        $personas = 0;
    }

    if ($cupo > 0) {
        $grupos = ceil($personas / $cupo);
        $tiempo = $grupos * $duracion;
    } else {
        $tiempo = 0;
    }

    $update = "UPDATE atracciones 
               SET personas = $personas,
                   tiempo_espera = $tiempo
               WHERE id = $id";

    $conexion->query($update);

    header("Location: filas.php");
    exit();
}
?>