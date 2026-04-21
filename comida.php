<?php
require "connect.php";

$resultado = $conexion->query("SELECT * FROM restaurantes");
$restaurantes = $resultado->fetch_all(MYSQLI_ASSOC);

$imagenes = [
    "KFC" => "../img/kfc.jpg",
    "Satay" => "../img/satay.jpg",
    "Pizza" => "../img/pizza.jpg",
    "Tipica" => "../img/tipica.jpg",
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comida</title>

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

    <h2 class="text-center mb-4">Restaurantes</h2>

    <div class="row">

<?php foreach ($restaurantes as $r): ?>

    // Cálculo del tiempo estimado de espera
    <?php $tiempo = $r['personas_fila'] * 2; ?>

    <div class="col-md-4 mb-4">

        <div class="card shadow">

            <img src="<?= $imagenes[$r['nombre']] ?? '../img/default.jpg' ?>">

            <div class="card-body text-center">

                <h5><?= $r['nombre'] ?></h5>

                <p>Estado: <?= $r['estado'] ?></p>

                <p>Personas en fila: <?= $r['personas_fila'] ?></p>

                <p class="fw-bold text-primary">
                    Tiempo estimado: <?= $tiempo ?> min
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