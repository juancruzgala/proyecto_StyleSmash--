<?php $session = session(); ?>

<main class="container my-5">
  <h2 class=" display-4 text-center">Mi Carrito</h2>

  <?php if (empty($carrito)): ?>
    <div class="alert alert-success text-center">Tu carrito está vacío.</div>
    <div style="height: 26vh;"></div>
  <?php else: ?>
    
    <div class="row">
      <?php foreach ($carrito as $item): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
          <div class="card h-100 text-justify">
            <img src="<?= base_url('assets/img/' . $item['imagen']) ?>" class="card-img-top" alt="<?= esc($item['name']) ?>">
            <div class="card-body">
              <h5 class="card-title"><?= esc($item['name']) ?></h5>
              <p class="card-text mb-1">Precio: $<?= number_format($item['price'], 0, ',', '.') ?></p>
              <p class="card-text mb-1">Cantidad: <?= esc($item['qty']) ?></p>
              <p class="card-text fw-bold">Subtotal: $<?= number_format($item['subtotal'], 0, ',', '.') ?></p>

              <a href="<?= base_url('carrito/eliminar/' . $item['rowid']) ?>" class="btn btn-sm btn-danger mt-2">Eliminar</a>
             
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-end mt-5">
      <h4>Total: $<?= number_format($total, 0, ',', '.') ?></h4>
      <a href="<?= base_url('carrito/confirmar') ?>" class="btn btn-success">Confirmar Compra</a>
      <a href="<?= base_url('tienda_view') ?>" class="btn btn-success">Seguir comprando</a>
    </div>
  <?php endif; ?>
</main>

