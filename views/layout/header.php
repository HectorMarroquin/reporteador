<?php 

$rol = $_SESSION['identity']->idgrupo;

$todo  = ['42'];
$admincor = ['220','227','157','32','193','237','212'];
$coach = ['150'];
$externos = ['226'];

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
     <link href="<?=base_url?>assets/img/logoLcc.png" rel="icon">
    <title>REPORTEADOR</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/estilos_header.css">

  <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/bootstrap/css/daterangepicker.css">

  <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/sweetalert/sweetalert2.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Raleway:wght@300&display=swap" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg sticky-top" id="navcolor">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="<?=base_url?>assets/img/logoBlanco.png" alt="" width="40" height="28" class="d-inline-block align-text-top"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHome" aria-controls="navbarHome" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarHome">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url?>Home/index">Inicio</a>
        </li>

        <?php if(isset($_SESSION['identity']) && in_array($rol,$todo)) : ?>    
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url?>VentasAltasUsuarios/index">Altas CM</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url?>Historico/index" tabindex="-1" aria-disabled="true">Historico</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url?>Reclutamiento/index" tabindex="-1" aria-disabled="true">Reclutamiento</a>
        </li>

      <?php elseif(isset($_SESSION['identity']) && in_array($rol,$admincor)): ?>

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url?>Historico/index" tabindex="-1" aria-disabled="true">Historico</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url?>VentasAltasUsuarios/index" tabindex="-1" aria-disabled="true">Altas CM</a>
        </li>

        <?php elseif(isset($_SESSION['identity']) && in_array($rol,$externos)): ?>

          <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Historico/index" tabindex="-1" aria-disabled="true">Historico</a>
          </li>

      <?php elseif(isset($_SESSION['identity']) && in_array($rol,$coach)): ?>

        <li class="nav-item">
          <a class="nav-link" href="<?=base_url?>VentasAltasUsuarios/index" tabindex="-1" aria-disabled="true">Altas CM</a>
        </li>
        <?php endif; ?>
      </ul>

      <?php if (isset($_SESSION['identity'])): ?>
       <span class="navbar-text"><?=$_SESSION['identity']->Nombre;?></span>
      <?php endif ?>

      <a class="nav-link" href="<?=base_url?>UsuarioCliente/logout" tabindex="-1" aria-disabled="true">Cerrar Sesión</a>

    </div>
  </div>
</nav>

