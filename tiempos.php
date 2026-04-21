<?php
require "connect.php";

$resultado = $conexion->query("SELECT * FROM atracciones");
$atracciones = $resultado->fetch_all(MYSQLI_ASSOC);

$imagenes = [
    "Montaña Rusa" => "../img/montanarusa.jpg",
    "La Torre" => "../img/torre.jpg",
    "Carritos Chocones" => "../img/carritoschocones.jpg",
    "Sillas Voladoras" => "../img/sillasvoladoras.jpg"
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tiempos de espera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Tiempos de espera</h2>

    <div class="row">

        <?php foreach ($atracciones as $a): ?>

            <div class="col-md-4 mb-4">
                <div class="card shadow">

                    <img src="<?= $imagenes[$a['nombre']] ?? '../img/default.jpg' ?>">

                    <div class="card-body text-center">
                        <h5><?= $a['nombre'] ?></h5>

                        <p>Personas en fila: <?= $a['personas'] ?></p>

                        <p class="fw-bold text-primary">
                            Tiempo: <?= $a['tiempo_espera'] ?> min
                        </p>
                    </div>

                </div>
            </div>

        <?php endforeach; ?>

    </div>

    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>

</div>

</body>
</html>