<?php
session_start();
require 'connect.php';

if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['correo'];
    $password = $_POST['password'];
// Busca el usuario
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ? LIMIT 1");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {

        $usuario = $resultado->fetch_assoc();

        if ($password == $usuario['password']) {

            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            header("Location: index.php");
            exit();

        } else {           
 // Contraseña incorrecta
            header("Location: login.php?error=pass");
            exit();
        }

    } else {
        header("Location: login.php?error=user");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow">
                <div class="card-body">

                    <h3 class="text-center mb-4">Iniciar Sesión</h3>

                    <?php if(isset($_GET['error'])): ?>
                        <div class="alert alert-danger text-center">
                            <?php
                                if($_GET['error'] == "pass") echo "Contraseña incorrecta";
                                if($_GET['error'] == "user") echo "Usuario no encontrado";
                            ?>
                        </div>
                    <?php endif; ?>

                    <form action="login.php" method="POST">

                        <input type="email" name="correo" class="form-control mb-3" placeholder="Correo" required>

                        <input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>

                        <button class="btn btn-primary w-100">Entrar</button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>