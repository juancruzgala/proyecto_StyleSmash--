<?php 
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('id_perfil'); 
$logueado = $session->get('logueado');
?>

<nav class="navbar navbar-expand-lg navbar-dark position-relative py-2 py-sm-3">
  <div class="container-fluid">

    <!-- Botón hamburguesa para móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php if ($logueado && $perfil == 1): ?>
      <!-- ADMINISTRADOR -->
      <div class="btn btn-success btn-sm text-white">
        ADMINISTRADOR: <?= esc($nombre); ?>
      </div>


      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
          <li class="nav-item"><a class="nav-link active" href="<?= base_url('/'); ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('usuarios'); ?>">CRUD usuarios</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('producto'); ?>">CRUD productos</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/ventas'); ?>">Muestra Ventas</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('consulta/listar'); ?>">Consultas</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('logout'); ?>">Cerrar sesión</a></li>
        </ul>
      </div>

    <?php elseif ($logueado && $perfil == 2): ?>
      <!-- CLIENTE LOGUEADO -->
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('tienda_view'); ?>">Tienda</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('acerca_de'); ?>">¿Quiénes Somos?</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('contacto'); ?>">Contacto</a></li>

          <!-- Menú Usuario (solo visible en pantallas pequeñas) -->
          <li class="nav-item dropdown d-block d-md-none">
            <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdownMobile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= esc($nombre); ?>
            </a>
            <ul class="dropdown-menu" style="background-color: rgb(60, 60, 58);">
              <li><a class="dropdown-item text-white mt-2" href="<?= base_url('mis_compras'); ?>">Mis Compras</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="<?= base_url('logout'); ?>">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- Logo centrado -->
      <a class="navbar-brand navbar-center position-absolute top-50 translate-middle" href="<?= base_url('/'); ?>">
        <img src="<?= base_url('assets/img/logonuevo.png'); ?>" alt="Logo de la empresa">
      </a>

      <!-- Carrito y Menú Usuario (pantallas grandes) -->
      <div class="position-absolute end-0 top-0 mt-2 mt-md-3 me-2 me-md-4 d-flex align-items-center gap-2 gap-md-4">

        <!-- Carrito siempre visible -->
        <a href="<?= base_url('carrito') ?>" class="btn btn-outline-secondary position-relative">
          🛒
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
            <?= $total_items ?? 0 ?>
          </span>
        </a>

        <!-- Menú Usuario (solo en pantallas grandes) -->
        <div class="dropdown d-none d-md-block">
          <button class="btn btn-success dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= esc($nombre); ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" style="background-color: rgb(60, 60, 58);">
            <li><a class="dropdown-item text-white mt-3" href="<?= base_url('mis_compras'); ?>">Mis Compras</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="<?= base_url('logout'); ?>">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>

    <?php else: ?>
      <!-- VISITANTE NO LOGUEADO -->
      <div class="collapse navbar-collapse" id="navbarContent">
        <!-- Logo -->
        <a class="navbar-brand navbar-center position-absolute top-50 translate-middle" href="<?= base_url('/'); ?>">
          <img src="<?= base_url('assets/img/logonuevo.png'); ?>" alt="Logo de la empresa">
        </a>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/login'); ?>">Iniciar Sesión</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/login'); ?>">Tienda</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/login'); ?>">Contacto</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('acerca_de'); ?>">¿Quiénes Somos?</a></li>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</nav>
