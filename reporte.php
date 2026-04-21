<?php
session_start();
require "connect.php";

// solo admin puede entrar
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

$atracciones = $conexion->query("SELECT nombre, personas FROM atracciones");
$restaurantes = $conexion->query("SELECT nombre, personas_fila FROM restaurantes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reporte Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f4f6f9;
    }

    .titulo {
        font-weight: 700;
        color: #333;
    }

    .card-header {
        font-weight: 600;
    }

    .table td, .table th {
        vertical-align: middle;
    }
</style>

</head>

<body>

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="titulo">Panel de Reportes del Parque</h2>
        <p class="text-muted">Solo acceso administrativo</p>
    </div>

    <div class="row g-4">

        //ATRACCIONES
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Atracciones
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th class="text-center">Personas en fila</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($a = $atracciones->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $a['nombre'] ?></td>
                                <td class="text-center fw-bold"><?= $a['personas'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        //RESTAURANTES
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    Restaurantes
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th class="text-center">Personas en fila</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($r = $restaurantes->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $r['nombre'] ?></td>
                                <td class="text-center fw-bold"><?= $r['personas_fila'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- BOTÓN -->
    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary px-4">⬅ Volver</a>
    </div>

</div>

</body>
</html>