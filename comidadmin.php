<?php
include __DIR__ . '/connect.php';

$sql = "SELECT * FROM restaurantes";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Comida</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card {
            border-radius: 12px;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">Panel Admin - Restaurantes</h2>

    <div class="row mt-4">

        <?php while($row = $result->fetch_assoc()) { ?>

        <div class="col-md-4 mb-4">

            <div class="card shadow">

                <div class="card-body text-center">

                    <h5><?= $row['nombre'] ?></h5>


                    //Formulario

                    <form action="actualizarcomida.php" method="POST">

                        <input type="hidden" name="id" value="<?= $row['id'] ?>">

                        <p class="mb-2">
                            Estado actual: <strong><?= $row['estado'] ?></strong>
                        </p>


                        //Selección del estado

                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select">
                            <option value="abierto" <?= $row['estado']=="abierto" ? "selected" : "" ?>>
                                Abierto
                            </option>
                            <option value="cerrado" <?= $row['estado']=="cerrado" ? "selected" : "" ?>>
                                Cerrado
                            </option>
                        </select>

                        //Modificar la cantidad de personas
                        <label class="form-label mt-2">Personas en fila</label>
                        <input type="number"
                               name="personas_fila"
                               class="form-control"
                               value="<?= $row['personas_fila'] ?>">

                        <button type="submit" class="btn btn-success w-100 mt-2">
                            Actualizar
                        </button>

                    </form>

                    //Formulario para vaciar
                    <form action="actualizarcomida.php" method="POST" class="mt-2">

                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="estado" value="<?= $row['estado'] ?>">
                        <input type="hidden" name="personas_fila" value="0">
                        <input type="hidden" name="accion" value="vaciar">

                        <button type="submit" class="btn btn-warning w-100">
                            Vaciar fila
                        </button>

                    </form>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>

</div>

</body>
</html>