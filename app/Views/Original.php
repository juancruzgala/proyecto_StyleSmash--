<!-- SECCIÓN PRINCIPAL CON FONDO GIF -->
<section class="home-section">
  <div class="content-container">
    <h1 class="animated-text display-4 fw-bold">Bienvenido a Style Smash</h1>
    <p class="lead">El estilo se encuentra con el pádel</p>
  </div>
</section>

<!-- SECCIÓN PRODUCTOS DESTACADOS -->
<div class="container seccion-producto">
  <h2 class="titulo-grande d-flex justify-content-center align-items-center gap-2">
    <img src="<?= base_url('assets/img/pelota.png') ?>" alt="Pelota" style="width: 35px; height: 35px">
    Productos destacados
    <img src="<?= base_url('assets/img/pelota.png') ?>" alt="Pelota" style="width: 35px; height: 35px">
  </h2>

  <div class="row justify-content-center flex-column align-items-center">
    <!-- Producto 1 -->
    <div class="col-12 mb-5 text-center">
      <div class="position-relative overflow-hidden rounded-circle mx-auto" style="width: 250px; height: 250px;">
        <img src="assets/img/metalbone2025.png" 
             data-hover="assets/img/Metalbone-perfil-hover.png" 
             alt="Paletas de Padel" 
             class="img-fluid w-100 h-100 object-fit-contain producto-hover rounded-circle">
      </div>
      <h3 class="producto-nombre mt-3">Paletas</h3>
    </div>

    <!-- Producto 2 -->
    <div class="col-12 mb-5 text-center">
      <div class="position-relative overflow-hidden rounded-circle mx-auto" style="width: 250px; height: 250px;">
        <img src="assets/img/pelotasbul.png" 
             data-hover="assets/img/pelota-bull-hover.png" 
             alt="Pelotas de padel" 
             class="img-fluid w-100 h-100 object-fit-contain producto-hover rounded-circle">
      </div>
      <h3 class="producto-nombre mt-3">Pelotas</h3>
    </div>

    <!-- Producto 3 -->
    <div class="col-12 mb-5 text-center">
      <div class="position-relative overflow-hidden rounded-circle mx-auto" style="width: 250px; height: 250px;">
        <img src="assets/img/bolsobab.png" 
             data-hover="assets/img/bolso-bab-hov.jpg" 
             alt="Bolso de padel" 
             class="img-fluid w-100 h-100 object-fit-contain producto-hover rounded-circle">
      </div>
      <h3 class="producto-nombre mt-3">Bolsos</h3>
    </div>
  </div>
</div>

<!-- SECCIÓN REDES SOCIALES -->
<div class="container social-section">
  <h2>Síguenos en las redes sociales</h2>
  <div class="row">
    <?php
      $imagenes = [
        "logoig.jpeg",
        "logowpp.jpeg",
        "logotiktok.jpeg",
        "logocorreo.jpeg"
      ];

      foreach ($imagenes as $imagen) {
        echo '
        <div class="col-6 col-md-3 social-card">
          <img src="assets/img/' . $imagen . '" class="img-fluid social-img" style="max-width: 100px" alt="Red social">
        </div>';
      }
    ?>
  </div>
</div>

<!-- SCRIPT CAMBIO DE IMAGEN EN HOVER -->
<script>
  document.querySelectorAll('.producto-hover').forEach(function(img) {
    const original = img.src;
    const hover = img.getAttribute('data-hover');

    img.addEventListener('mouseover', () => {
      img.src = hover;
    });

    img.addEventListener('mouseout', () => {
      img.src = original;
    });
  });
</script>

<!-- ESTILO EXTRA SOLO PARA INICIO -->
<style>
  .producto-nombre {
    font-size: 2rem;
    color: #0b7a2f;
    text-decoration: none;
  }
</style>


