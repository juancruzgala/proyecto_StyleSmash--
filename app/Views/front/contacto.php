<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contacto | Style Smash</title>
  <link rel="stylesheet" href="/proyecto_StyleSmash/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/proyecto_StyleSmash/assets/css/miestilo.css">
</head>
<body>

<main class="container my-5">
  <h2 class="mb-4">¿Querés contactarnos?</h2>
  <div class="row">
    <div class="col-12 col-md-6">

      <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
      <?php endif; ?>

      <form action="<?= base_url('/consulta/guardar') ?>" method="post">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="correo" name="email" required>
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="mb-3">
          <label for="mensaje" class="form-label">Mensaje</label>
          <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
        </div>
        <div class="d-flex gap-2 flex-wrap">
          <button type="submit" class="btn btn-success">Enviar mensaje</button>
          <button type="reset" class="btn btn-secondary">Borrar formulario</button>
        </div>
      </form>
    </div>

    <div class="col-12 col-md-6">
      <h5 class="mb-3">También podés contactarnos desde:</h5>
      <p><strong>Email:</strong> contacto@stylesmash.com</p>
      <p><strong>Teléfono:</strong> +54 9 3794033420</p>
      <p><strong>Dirección:</strong> 9 de Julio 1449</p>
    </div>
  </div>
</main>

