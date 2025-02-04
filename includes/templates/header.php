<?php
// header.php
  

  if(!isset($_SESSION['usuario'])) {
    session_start();
  }

  $auth = $_SESSION['login'] ?? false;

  // var_dump($auth);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verdeplata</title>
  <?php if (isset($inicio) && $inicio): ?>
    <!-- Incluir Font Awesome para los íconos SOLO en index -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <?php endif; ?>
  <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
  <!-- Se agrega la clase "inicio" al header si $inicio es true -->
  <header class="header <?php echo (isset($inicio) && $inicio) ? 'inicio' : ''; ?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="/">
          <img src="/build/img/logo_verdeplata_filled.svg" alt="Logotipo de verdeplata">
        </a>

        <div class="mobile-menu">
          <img src="/build/img/barras.svg" alt="Icono menú responsive">
        </div>

        <div class="derecha">
          <!-- Botón de Modo Oscuro Mejorado -->
          <button class="boton-dark-mode" aria-label="Alternar modo oscuro">
            <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Botón modo oscuro">
          </button>
          <nav class="navegacion">
            <!-- Enlaces de navegación: se muestran los íconos solo si $inicio es true -->
            <a href="nosotros.php">
              <?php if (isset($inicio) && $inicio): ?>
                <i class="fas fa-users"></i>
              <?php endif; ?>
              Nosotros
            </a>
            <a href="articulos.php">
              <?php if (isset($inicio) && $inicio): ?>
                <i class="fas fa-list"></i>
              <?php endif; ?>
              Artículos
            </a>
            <a href="ubicanos.php">
              <?php if (isset($inicio) && $inicio): ?>
                <i class="fas fa-blog"></i>
              <?php endif; ?>
              Ubícanos
            </a>
            <a href="contacto.php">
              <?php if (isset($inicio) && $inicio): ?>
                <i class="fas fa-envelope"></i>
              <?php endif; ?>
              Contacto
            </a>
            <?php if ($auth): ?>
              <a href="cerrar-sesion.php">
                <i class="fas fa-sign-out-alt"></i> logout
              </a>
            <?php endif; ?>
          </nav>
        </div>
      </div> <!-- .barra -->

      <?php if (isset($inicio) && $inicio): ?>
      <!-- Contenido extra solo para la página de inicio -->
      <div class="header-extra">
        <h1>Bienvenido a Verdeplata Naturaleza y vida</h1>
        <!-- Puedes agregar aquí una imagen de fondo u otro contenido exclusivo para index -->
        <!-- Ejemplo: <img src="build/img/imagen_fondo.jpg" alt="Imagen de fondo"> -->
      </div>
      <?php endif; ?>

    </div>
  </header>
