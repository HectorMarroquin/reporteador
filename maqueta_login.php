<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <link href="assets/img/logoLcc.png" rel="icon">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url?>assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url?>assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url?>assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=base_url?>assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?=base_url?>assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>REPORTEADOR</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/estilos_home.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/bootstrap/css/bootstrap.min.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">

  <!-- index.php?controller=UsuarioReporte&action=login -->
  <form action="<?=base_url?>UsuarioCliente/login" method="POST">
    <img class="mb-4" src="assets/img/lcc_azul.png" alt="" width="150" height="57">

    <?php if(isset($_SESSION['error_login'])) :?>

    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error_login']; ?>
    </div>

  <?php endif; ?>

    <h1 class="h3 mb-3 fw-normal">Iniciar sesión LCC</h1>
    <label for="usuario" class="visually-hidden">Usuario</label>
    <input type="text" id="nomina" class="form-control" placeholder="Usuario" required autofocus name="usuario" autocomplete="off">
    <label for="contrasena" class="visually-hidden">Contraseña</label>
    <input type="password" id="contrasena" class="form-control" placeholder="Contraseña" name="password" autocomplete="off" required>
 
    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
  </form>
</main>


    
  </body>
</html>