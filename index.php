<?php
session_start();
$rol = $_SESSION['rol'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sistema Parque de Diversiones</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
header {
    background: linear-gradient(to right, #0d6efd, #20c997);
    color: white;
}
section {
    padding: 60px 0;
}
footer {
    background-color: #212529;
    color: white;
}
</style>
</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
<a class="navbar-brand" href="#page-top">Parque de Diversiones</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ms-auto">

<?php if ($rol): ?>
    <li class="nav-item"><a class="nav-link" href="logout.php">Cerrar Sesión</a></li>
<?php else: ?>
    <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
<?php endif; ?>

</ul>
</div>
</div>
</nav>

<header class="py-5" id="inicio">
<div class="container px-4 text-center">
<h1 class="fw-bolder">Sistema del Parque de Diversiones</h1>
<p class="lead">Gestión de atracciones, filas y tiempos de espera</p>
</div>
</header>

<section id="funciones">
<div class="container px-4">
<div class="row gx-4 justify-content-center">
<div class="col-lg-8 text-center">

<h2>Funciones del Sistema</h2>

<p class="lead">
Esta plataforma web permite mejorar la experiencia de los visitantes del Parque de Diversiones
mediante el control y monitoreo de los tiempos de espera y la gestión de atracciones.
</p>

<ul class="list-group mt-4">

<li class="list-group-item">
    <a href="tiempos.php" class="text-decoration-none">Consulta de tiempos de espera por atracción</a>
</li>

<li class="list-group-item">
    <a href="comida.php" class="text-decoration-none">Información sobre áreas de comida</a>
</li>

<?php if ($rol == 'admin'): ?>

<li class="list-group-item">
    <a href="filas.php" class="text-decoration-none">ADMINISTRACIÓN - Atracciones</a>
</li>

<li class="list-group-item">
    <a href="comidadmin.php" class="text-decoration-none">ADMINISTRACIÓN - Comidas</a>
</li>

<?php endif; ?>

</ul>

</div>
</div>
</div>
</section>

<section class="bg-light" id="acerca">
<div class="container px-4">
<div class="row gx-4 justify-content-center">
<div class="col-lg-8 text-center">

<h2>Acerca del Proyecto</h2>
<p class="lead">
Este sistema fue desarrollado como parte del proyecto académico del curso Ambiente Web Cliente-Servidor.
Su objetivo principal es reducir los tiempos de espera en las atracciones y mejorar la planificación
de la visita al Parque de Diversiones mediante el uso de tecnología web.
</p>

</div>
</div>
</div>
</section>

<footer class="py-4">
<div class="container px-4 text-center">
<p class="m-0">© 2026 - Sistema Parque de Diversiones</p>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>