<div class="container my-5">
  <h2 class="mb-4 display-4 text-center">Mis Compras</h2>

  <?php
    // Filtrar solo las compras que tienen ítems
    $comprasConItems = array_filter($compras, function($c) {
      return !empty($c['items']);
    });
  ?>

  <?php if (empty($comprasConItems)): ?>
    <div class="text-center my-5">
      <img src="<?= base_url('assets/img/no_compra.png') ?>" alt="Carrito vacío" class="img-fluid mb-2" style="max-width: 150px;">
      <h4 class="text-secondary">Aún no realizaste ninguna compra </h4>
      <p class="text-muted">¡Cuando lo hagas, tus productos aparecerán aquí!</p>
      <a href="<?= base_url('tienda_view') ?>" class="btn btn-success mt-3">
        <i class="fas fa-shopping-cart me-2"></i> Ir a la tienda
      </a>
    </div>
  <?php endif; ?>

  <?php foreach ($compras as $compra): ?>
    <?php if (!empty($compra['items'])): ?>
      <h5 class="text-muted mt-5">Compra del <?= date('d/m/Y', strtotime($compra['fecha'])) ?></h5>

      <div class="row">
        <?php foreach ($compra['items'] as $item): ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
            <div class="card h-100 text-justify">
              <img src="<?= base_url('assets/img/' . $item['imagen']) ?>" class="card-img-top" alt="<?= esc($item['nombre_prod']) ?>">
              <div class="card-body">
                <h5 class="card-title"><?= esc($item['nombre_prod']) ?></h5>
                <p class="card-text mb-1">Precio: $<?= number_format($item['precio'], 0, ',', '.') ?></p>
                <p class="card-text mb-1">Cantidad: <?= esc($item['cantidad']) ?></p>
                <p class="card-text fw-bold">Subtotal: $<?= number_format($item['subtotal'], 0, ',', '.') ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

