<?php
session_start();
require "connect.php";

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

$resultado = $conexion->query("SELECT * FROM atracciones");
$atracciones = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Filas Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 15px;
        }

        .form-control {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">Administración de Filas</h2>

    <div class="row mt-4">

        <?php foreach ($atracciones as $a): ?>

        <div class="col-md-4 mb-4">

            <div class="card shadow">

                <div class="card-body text-center">

                    <h5><?= $a['nombre'] ?></h5>

                    <p>Personas actuales: <strong><?= $a['personas'] ?></strong></p>

                    <form method="POST" action="actualizarfila.php">

                        <input type="hidden" name="id" value="<?= $a['id'] ?>">

                        <div class="mb-2">
                            <input type="number"
                                   name="cantidad"
                                   class="form-control"
                                   placeholder="Cantidad de personas">
                        </div>

                        <button name="accion" value="agregar"
                                class="btn btn-success btn-sm w-100 mb-2">
                            Agregar personas
                        </button>

                        <button name="accion" value="vaciar"
                                class="btn btn-warning btn-sm w-100">
                            Vaciar fila
                        </button>

                    </form>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </div>

</div>

</body>
</html>